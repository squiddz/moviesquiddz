<?php
 #############################################################################
 # IMDBPHP                              (c) Giorgos Giagas & Itzchak Rehberg #
 # written by Giorgos Giagas                                                 #
 # extended & maintained by Itzchak Rehberg <izzysoft AT qumran DOT org>     #
 # http://www.izzysoft.de/                                                   #
 # ------------------------------------------------------------------------- #
 # This program is free software; you can redistribute and/or modify it      #
 # under the terms of the GNU General Public License (see doc/LICENSE)       #
 # ------------------------------------------------------------------------- #
 # Search for $name and display results                                      #
 #############################################################################
 # $Id: imdbsearch.php 118 2008-05-09 09:01:35Z izzy $

 
 
# Search for the movie:

require_once("imdb.class.php"); // include the class file
$search = new imdbsearch();     // create an instance of the search class
$search->setsearchname($_GET["name"]);  // tell the class what to search for (case insensitive)
$results = $search->results();  // submit the search


echo '<ol>';
foreach ($results as $res) {
	$mid  = $res->imdbid(); // this is the all-important Movie ID!

	$movie   = new imdb($mid);         // create an instance of the class and pass it the IMDB ID
	$title   = $movie->title();        // retrieve the movie title
	$year    = $movie->year();         // obtain the year of production
	$runtime = $movie->runtime();      // runtime in minutes
	// $rating  = $movie->mpaa();         // array[country=>rating] of ratings
	// $trailer = $movie->trailers();     // array of trailers

  // now do something with these data
  echo '<li><a href="http://www.imdb.com/title/tt'.$mid.'">'.$title.' ('.$year.')</a> <span>[ ' . $runtime . ' ]</span></li>';
}
echo '</ol>';

?>
