<?php

// 	##################################################
// 	Header + Version Info
require("includes/header.php");
//	##################################################


// 	##################################################
// 	Configuration Settings
require("config.php");
//	##################################################


//	##################################################
//	Convert files into arrays for use in the script!
$all_releases = file($file_listing_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$scene_groups_array = file($scene_group_list,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$tags = file($other_tags,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
rsort($tags); // reverse sorts, to fix errors like "HDDVD" -> "HDDVDRip" anomaly.
$gotnzb4u_requests = file_get_contents($gotnzb4u_requests_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//	##################################################


// 	##################################################
// 	Create Table Top Row
echo '<table class="sortable" border="1">'."\n".'<tr><th><strong>Name</strong></th>';
if ($show_movie_name == TRUE) {echo'<th>Movie Name</th>';};
if ($show_group_name == TRUE) {echo'<th>Group Name</th>';};
if ($feature_detect_scene == TRUE) {echo'<th><img src="images/question.png" alt="S" title="Scene [tick] or Non-Scene [cross]" /></th>';};
if ($feature_imdb_link == TRUE) {echo'<th class="sorttable_nosort"><img src="images/imdb.png" alt="IMDB" title="IMDB Popup Links" /></a></th>';};
if ($feature_imdb_search_link == TRUE) {echo'<th class="sorttable_nosort"><img src="images/imdb_grey.png" alt="IMDB" title="IMDB External Search Links" /></a></th>';};
if ($feature_rt_link == TRUE) {echo'<th class="sorttable_nosort"><img src="images/rt.png" alt="RT" title="Rotten Tomatoes Search Links" /></th>';};
if ($feature_nfo_link == TRUE) {echo'<th class="sorttable_nosort"><img src="images/info.png" alt="NFO" title="NFO Links" /></th>';};
if ($feature_rescene_link == TRUE) {echo'<th class="sorttable_nosort"><img src="images/rescene.png" alt="RS" title="ReScene Links" /></th>';};
if ($feature_orly_link == TRUE) {echo'<th class="sorttable_nosort"><img src="images/orly.png" alt="ORLY" title="ORLY PreDB Links" /></th>';};
if ($feature_scenehd_link == TRUE) {echo'<th class="sorttable_nosort"><img src="images/scenehd.png" alt="SceneHD" title="SceneHD.org Links" /></th>';};
if ($feature_scenehd_reseed == TRUE) {echo'<th><img src="images/scenehd-bw.png" alt="SceneHD" title="SceneHD.org Links" /></th>';};
if ($feature_binsearch_link == TRUE) {echo'<th class="sorttable_nosort"><img src="images/binsearch.png" alt="BinSearch" title="BinSearch NZB Links" /></th>';};
if ($feature_gotnzb4u_x264_link == TRUE) {echo'<th><img src="images/gotnzb4u.png" alt="GotNZB4U" title="GotNZB4U x264 Links" /></th>';};
if ($feature_subsource_link == TRUE) {echo'<th class="sorttable_nosort"><img src="images/subtitlesource.png" alt="SubSource" title="SubtitleSource Link" /></th>';};
if ($feature_local_folder_link == TRUE) {echo'<th class="sorttable_nosort"><img src="images/open_folder.png" alt="Open" title="Open Folder Locally" /></th>';};
echo '</tr>'."\n";
// 	##################################################


// 	##################################################
// 	Sort List Alphabetically
if ($feature_sort_list == TRUE) {
sort($all_releases); // sort the releases alphabetically
} //##################################################


// 	##################################################
// 	Grab and manage the SceneHD list
if ($feature_scenehd_reseed == TRUE) {

// Generate an array from the file listing on scenehd.
$scenehd_list = file($scenehd_list_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$scenehd_reqlist = file($scenehd_reqlist_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// We need to remove the <br> and <br /> from the end of the lines, respectively.
// no idea why they're not consistent!
$scenehd_list = preg_replace('/<br \/>/', '', $scenehd_list);
$scenehd_reqlist = preg_replace('/<br>/', '', $scenehd_reqlist);

// Extract the first line of the file (number of releases found..)
// reset($array); is probably not necessary, as we're already on the first element.
$scenehd_list_num = current($scenehd_list);
$scenehd_reqlist_num = current($scenehd_reqlist);

// destroy the first element of the array
unset($scenehd_list[0]);
unset($scenehd_reqlist[0]);
// now we have complete arrays of releases and requests.
} //##################################################


// TAKE EACH RELEASE IN TURN >>>
foreach ($all_releases as $release_name) {

// 	##################################################
// 	Calculate common variables (moviename, groupname etc).
require("includes/release2movie.php");
//	##################################################

// Begin a new row for the release.
echo "<tr><td>".$release_name."</td>"; // Display Release Name
if ($show_movie_name == TRUE) {echo"<td>".$movie_name."</td>";}; // Display Movie Name
if ($show_group_name == TRUE) {echo"<td>".$group_name."</td>";}; // Display Group Name

//	##################################################
// 	Detect Scene
if ($feature_detect_scene == TRUE) {
include("includes/feature_detect_scene.php");
}// ##################################################

//	##################################################
// 	Generate IMDB links
if ($feature_imdb_link == TRUE) {
echo '<td><a href="imdbphp/imdbsearch.php?name='.$movie_name.'&searchtype=movie" onclick="return hs.htmlExpand(this, { objectType: '."'".'ajax'."'".', width: '."'".'500'."'".', headingText: '."'".'IMDb Information'."'".', wrapperClassName: '."'".'titlebar'."'".' } )"><img src="images/imdb.png" /></a></td>';
}// ##################################################


//	##################################################
// 	Generate IMDB manual search links
if ($feature_imdb_search_link == TRUE) {
echo '<td><a href="http://www.imdb.com/find?s=tt&q='.$movie_name.'"><img src="images/imdb_grey.png" /></a></td>';
}// ##################################################

// 	##################################################
// 	Generate Rotten Tomatoes links
if ($feature_rt_link == TRUE) {
echo '<td><a href="http://www.rottentomatoes.com/search/full_search.php?search='.$movie_name.'"><img src="images/rt.png" /></a></td>';
}//	##################################################


// 	##################################################
// 	Generate NFO Link
if ($feature_nfo_link == TRUE) {
echo '<td><a href="#?release='.$release_name.'"><img src="images/info.png" /></a></td>';
}// ##################################################

// ###################################################
// 	Generate ReScene Link
if ($feature_rescene_link == TRUE) {
echo '<td><a href="http://x264.rescene.info/details.aspx?Section=movies&Release='.$release_name.'"><img src="images/rescene.png" /></a></td>';
}//	##################################################


// ###################################################
// 	Generate ORLY PreDB Link
if ($feature_orly_link == TRUE) {
echo '<td><a href="http://www.orlydb.com/?q='.$release_name.'"><img src="images/orly.png" /></a></td>';
}//	##################################################

// 	##################################################
// 	Generate SceneHD Link
if ($feature_scenehd_link == TRUE) {
echo '<td><a href="https://scenehd.org/#search='.$release_name.'"><img src="images/scenehd.png" /></a></td>';
}// ##################################################


// 	##################################################
// 	SceneHD ReSeed
if ($feature_scenehd_reseed == TRUE) {
include("includes/feature_scenehd_reseed.php");
}// ##################################################


// 	##################################################
// 	Generate BinSearch Link
if ($feature_binsearch_link == TRUE) {
echo '<td><a href="http://www.binsearch.info/?q='.$release_name.'&max=250&adv_age=365="><img src="images/binsearch.png" /></a></td>';
}// ##################################################

// 	##################################################
// 	Generate GotNZB4U x264 Search Link
if ($feature_gotnzb4u_x264_link == TRUE) {
include("includes/feature_gotnzb4u_x264_link.php");
}// ##################################################

// 	##################################################
// 	Generate SubtitleSource Search Link
if ($feature_subsource_link == TRUE) {
echo '<td><a href="http://www.subtitlesource.org/search/'.$release_name.'"><img src="images/subtitlesource.png" /></a></td>';
}// ##################################################

// ###################################################
// 	Local Folder
if ($feature_local_folder_link == TRUE) {
echo '<td><a href="' . $release_dirs . "/" . $release_name . '"><img src="images/open_folder.png" /></a></td>';
}//	##################################################

echo '</tr>'."\n"; // close the last row.
} // This is the end of the foreach loop.
echo '</table>'; // Now we're outside the loop, close the table..

// 	##################################################
// 	Footer
require("includes/footer.php");
//	##################################################

?>