<?php
 #############################################################################
 # IMDBPHP                              (c) Giorgos Giagas & Itzchak Rehberg #
 # written by Giorgos Giagas                                                 #
 # extended & maintained by Itzchak Rehberg <izzysoft AT qumran DOT org>     #
 # http://www.izzysoft.de/                                                   #
 # ------------------------------------------------------------------------- #
 # This program is free software; you can redistribute and/or modify it      #
 # under the terms of the GNU General Public License (see doc/LICENSE)       #
 #############################################################################

 /* $Id: imdb_base.class.php 135 2008-05-20 22:48:18Z izzy $ */

 require_once (dirname(__FILE__)."/browseremulator.class.php");
 require_once (dirname(__FILE__)."/imdb_config.class.php");
 require_once (dirname(__FILE__)."/imdb_request.class.php");

 #=================================================[ The IMDB class itself ]===
 /** Accessing IMDB information
  * @package Api
  * @class imdb_base
  * @extends imdb_config
  * @author Georgos Giagas
  * @author Izzy (izzysoft AT qumran DOT org)
  * @copyright (c) 2002-2004 by Giorgos Giagas and (c) 2004-2008 by Itzchak Rehberg and IzzySoft
  * @version $Revision: 135 $ $Date: 2008-05-21 00:48:18 +0200 (Mi, 21 Mai 2008) $
  */
 class imdb_base extends imdb_config {

 #---------------------------------------------------------[ Debug helpers ]---
  function debug_scalar($scalar) {
    if ($this->debug) echo "<b><font color='#ff0000'>$scalar</font></b><br>";
  }
  function debug_object($object) {
    if ($this->debug) {
      echo "<font color='#ff0000'><pre>";
      print_r($object);
      echo "</pre></font>";
    }
  }
  function debug_html($html) {
    if ($this->debug) echo "<b><font color='#ff0000'>".htmlentities($html)."</font></b><br>";
  }

 #-------------------------------------------------------------[ Open Page ]---
  /** Define page urls
   * @method private set_pagename
   * @param string wt internal name of the page
   * @return string urlname page URL
   */
  function set_pagename($wt) {
   return false;
  }

  /** Load an IMDB page into the corresponding property (variable)
   * @method private openpage
   * @param string wt internal name of the page
   * @param optional string type whether its a "movie" (default) or a "person"
   */
  function openpage ($wt,$type="movie") {
   if (strlen($this->imdbID) != 7){
    $this->debug_scalar("not valid imdbID: ".$this->imdbID."<BR>".strlen($this->imdbID));
    $this->page[$wt] = "cannot open page";
    return;
   }
   $urlname = $this->set_pagename($wt);
   if ($urlname===false) return;

   if ($this->usecache) {
    $fname = "$this->cachedir/$this->imdbID.$wt";
    if ( $this->usezip ) {
     if ( ($this->page[$wt] = @join("",@gzfile($fname))) ) {
      if ( $this->converttozip ) {
       @$fp = fopen ($fname,"r");
       $zipchk = fread($fp,2);
       fclose($fp);
       if ( !($zipchk[0] == chr(31) && $zipchk[1] == chr(139)) ) { //checking for zip header
         /* converting on access */
         $fp = @gzopen ($fname, "w");
         @gzputs ($fp, $this->page[$wt]);
         @gzclose ($fp);
       }
      }
      return;
     }
    } else { // no zip
     @$fp = fopen ($fname, "r");
     if ($fp) {
      $temp="";
      while (!feof ($fp)) {
	 $temp .= fread ($fp, 1024);
	 $this->page[$wt] = $temp;
      }
      return;
     }
    }
   } // end cache

   $req = new IMDB_Request("");
   switch ($type) {
     case "person" : $url = "http://".$this->imdbsite."/name/nm".$this->imdbID.$urlname; break;
     default       : $url = "http://".$this->imdbsite."/title/tt".$this->imdbID.$urlname;
   }
   $req->setURL($url);
   $req->sendRequest();
   $this->page[$wt]=$req->getResponseBody();

   if( $this->page[$wt] ){ //storecache
    if ($this->storecache) {
     if (!is_dir($this->cachedir)) {
       $this->debug_scalar("<BR>***ERROR*** Configured cache directory does not exist!<BR>");
       return;
     }
     if (!is_writable($this->cachedir)) {
       $this->debug_scalar("<BR>***ERROR*** Configured cache directory lacks write permission!<BR>");
       return;
     }
     $fname = "$this->cachedir/$this->imdbID.$wt";
     if ( $this->usezip ) {
      $fp = gzopen ($fname, "w");
      gzputs ($fp, $this->page[$wt]);
      gzclose ($fp);
     } else { // no zip
      $fp = fopen ($fname, "w");
      fputs ($fp, $this->page[$wt]);
      fclose ($fp);
     }
    }
    return;
   }
   $this->page[$wt] = "cannot open page";
   $this->debug_scalar("cannot open page: $url");
  }

 #-------------------------------------------------------[ Get current MID ]---
  /** Retrieve the IMDB ID
   * @method imdbid
   * @return string id IMDBID currently used
   */
  function imdbid () {
   return $this->imdbID;
  }

 #--------------------------------------------------[ Start (over) / Reset ]---
  /** Reset page vars
   * @method private reset_vars
   */
  function reset_vars() {
    return;
  }

  /** Setup class for a new IMDB id
   * @method setid
   * @param string id IMDBID of the requested movie
   */
  function setid ($id) {
   if (!preg_match("/^\d{7}$/",$id)) $this->debug_scalar("<BR>setid: Invalid IMDB ID '$id'!<BR>");
   $this->imdbID = $id;
   $this->reset_vars();
  }

 #-----------------------------------------------------------[ Constructor ]---
  /** Initialize class
   * @constructor imdb_base
   * @param string id IMDBID to use for data retrieval
   */
  function imdb_base ($id) {
   $this->imdb_config();
   $this->setid($id);
   if ($this->storecache && ($this->cache_expire > 0)) $this->purge();
  }

 #---------------------------------------------------------[ Cache Purging ]---
  /** Check cache and purge outdated files
   *  This method looks for files older than the cache_expire set in the
   *  imdb_config and removes them
   * @method purge
   */
  function purge() {
    if (is_dir($this->cachedir))  {
      if (is_writable($this->cachedir)) {
        $thisdir = dir($this->cachedir);
        $now = time();
        while( $file=$thisdir->read() ) {
          if ($file!="." && $file!="..") {
            $fname = $this->cachedir . $file;
	    if (is_dir($fname)) continue;
            $mod = filemtime($fname);
            if ($mod && ($now - $mod > $this->cache_expire)) unlink($fname);
          }
        }
      } elseif (!empty($this->cachedir)) {
        $this->debug_scalar("Cache directory (".$this->cachedir.") lacks write permission - purge aborted.");
      }
    } elseif (!empty($this->cachedir)) {
      $this->debug_scalar("Cache directory (".$this->cachedir.") does not exist - purge aborted.");
    }
  }

 } // end class imdb

 #====================================================[ IMDB Search class ]===
 /** Search the IMDB for a title and obtain the movies IMDB ID
  * @package Api
  * @class imdbsearch
  * @extends imdb_config
  */
 class imdbsearch extends imdb_config{
  var $page = "";
  var $name = NULL;
  var $resu = array();
  var $url = "http://www.imdb.com/";

  /** Read the config
   * @constructor imdbsearch
   */
  function imdbsearch() {
    $this->imdb_config();
    $this->search_episodes(FALSE);
  }

  /** Search for episodes or movies
   * @method search_episodes
   * @param boolean enabled TRUE: Search for episodes; FALSE: Search for movies (default)
   */
  function search_episodes($enable) {
    $this->episode_search = $enable;
  }

  /** Set the name (title) to search for
   * @method setsearchname
   * @param string searchstring what to search for - (part of) the movie name
   */
  function setsearchname ($name) {
   $this->name = $name;
   $this->page = "";
   $this->url = NULL;
  }

  /** Set the URL (overwrite default search URL and run your own)
   *  This URL will be reset if you call the setsearchname() method
   * @method seturl
   * @param string URL to use
   */
  function seturl($url){
   $this->url = $url;
  }

  /** Create the IMDB URL for the movie search
   * @method private mkurl
   * @return string url
   */
  function mkurl () {
   if ($this->url !== NULL){
    $url = $this->url;
   }else{
     if (!isset($this->maxresults)) $this->maxresults = 20;
     if ($this->maxresults > 0) $query = ";mx=20";
     if ($this->episode_search) $url = "http://".$this->imdbsite."/find?q=".urlencode($this->name).$query.";s=ep";
     else {
       switch ($this->searchvariant) {
         case "moonface" : $query .= ";more=tt;nr=1"; // @moonface variant (untested)
         case "sevec"    : $query .= "&restrict=Movies+only&GO.x=0&GO.y=0&GO=search;tt=1"; // Sevec ori
         default         : $query .= ";tt=on"; // Izzy
       }
       $url = "http://".$this->imdbsite."/find?q=".urlencode($this->name).$query;
     }
   }
   return $url;
  }

  /** Setup search results
   * @method results
   * @param optional string URL Replace search URL by your own
   * @return array results array of objects (instances of the imdb class)
   */
  function results ($url="") {
   if ($this->page == "") {
     if (empty($url)) $url = $this->mkurl();
     $be = new IMDB_Request($url);
     $be->sendrequest();
     $fp = $be->getResponseBody();
     if ( !$fp ){
       if ($header = $be->getResponseHeader("Location")){
        if (strpos($header,$this->imdbsite."/find?")) {
          return $this->results($header);
          break(4);
        }
        $url = explode("/",$header);
        $id  = substr($url[count($url)-2],2);
        $this->resu[0] = new imdb($id);
        return $this->resu;
       }else{
        return NULL;
       }
     }
     $this->page = $fp;
   } // end (page="")

   $searchstring = array( '<A HREF="/title/tt', '<A href="/title/tt', '<a href="/Title?', '<a href="/title/tt');
   $i = 0;
   if ($this->maxresults > 0) $maxresults = $this->maxresults; else $maxresults = 999999;
   foreach($searchstring as $srch){
    $res_e = 0;
    $res_s = 0;
    $mids_checked = array();
    $len = strlen($srch);
    while ((($res_s = strpos ($this->page, $srch, $res_e)) > 10)) {
      if ($i == $maxresults) break(2); // limit result count
      $res_e = strpos ($this->page, "(", $res_s);
      $imdb_id = substr($this->page, $res_s + $len, 7);
      $ts = strpos($this->page, ">",$res_s) +1; // >movie title</a>
      $te = strpos($this->page,"<",$ts);
      $title = substr($this->page,$ts,$te-$ts);
      if (($title == "") || (in_array($imdb_id,$mids_checked))) continue; // empty titles just come from the images
      $mids_checked[] = $imdb_id;
      $tmpres = new imdb ($imdb_id); // make a new imdb object by id
      $tmpres->main_title = $title;
      $ts = strpos($this->page,"(",$te) +1;
      $te = strpos($this->page,")",$ts);
      $tmpres->main_year=substr($this->page,$ts,$te-$ts);
      $i++;
      $this->resu[$i] = $tmpres;
    }
   }
   return $this->resu;
  }
} // end class imdbsearch

?>
