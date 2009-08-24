<?php

// 	##################################################
// 	Header + Version Info
require("includes/header.php");
$msVersion = '0.4';
$msDebug = TRUE; // Display advanced info, such as version number.
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
//	##################################################


// 	##################################################
// 	Create Table Top Row
echo '<table border="1"><tr><td><strong>Name</strong></td>';
if ($feature_detect_scene == TRUE) {echo'<td><img src="images/question.png" alt="S" title="Scene [tick] or Non-Scene [cross]" /></td>';};
if ($feature_imdb_link == TRUE) {echo'<td><img src="images/imdb.png" alt="IMDB" title="IMDB Popup Links" /></a></td>';};
if ($feature_imdb_search_link == TRUE) {echo'<td><img src="images/imdb_grey.png" alt="IMDB" title="IMDB External Search Links" /></a></td>';};
if ($feature_rt_link == TRUE) {echo'<td><img src="images/rt.png" alt="RT" title="Rotten Tomatoes Search Links" /></td>';};
if ($feature_nfo_link == TRUE) {echo'<td><img src="images/info.png" alt="NFO" title="NFO Links" /></td>';};
if ($feature_rescene_link == TRUE) {echo'<td><img src="images/rescene.png" alt="RS" title="ReScene Links" /></td>';};
if ($feature_orly_link == TRUE) {echo'<td><img src="images/orly.png" alt="ORLY" title="ORLY PreDB Links" /></td>';};
if ($feature_scenehd_link == TRUE) {echo'<td><img src="images/scenehd.png" alt="SceneHD" title="SceneHD.org Links" /></td>';};
if ($feature_binsearch_link == TRUE) {echo'<td><img src="images/binsearch.png" alt="BinSearch" title="BinSearch NZB Links" /></td>';};
if ($feature_gotnzb4u_x264_link == TRUE) {echo'<td><img src="images/gotnzb4u.png" alt="GotNZB4U" title="GotNZB4U x264 Links" /></td>';};
if ($feature_subsource_link == TRUE) {echo'<td><img src="images/subtitlesource.png" alt="SubtitleSource" title="SubtitleSource Link" /></td>';};
if ($feature_local_folder_link == TRUE) {echo'<td><img src="images/open_folder.png" alt="Open" title="Open Folder Locally" /></td>';};
echo '</tr>';
// 	##################################################


// 	##################################################
// 	Sort List Alphabetically
if ($feature_sort_list == TRUE) {
sort($all_releases); // sort the releases alphabetically
} //##################################################


// TAKE EACH RELEASE IN TURN >>>
foreach ($all_releases as $release_name) {
// Begin a new row for the release.
echo '<tr>';
// Display Release Name
echo "<td>" . $release_name . "</td>";


//	##################################################
// 	Detect Scene
if ($feature_detect_scene == TRUE) {
include("includes/feature_detect_scene.php");
}// ##################################################


//	##################################################
// 	Generate IMDB links
if ($feature_imdb_link == TRUE) {
include("includes/feature_imdb_link.php");
}// ##################################################


// 	##################################################
// 	Generate Rotten Tomatoes links
if ($feature_rt_link == TRUE) {
include("includes/feature_rt_link.php");
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
// 	Generate ORLD PreDB Link
if ($feature_orly_link == TRUE) {
echo '<td><a href="http://www.orlydb.com/?q='.$release_name.'"><img src="images/orly.png" /></a></td>';
}//	##################################################

// 	##################################################
// 	Generate SceneHD Link
if ($feature_scenehd_link == TRUE) {
echo '<td><a href="https://scenehd.org/#search='.$release_name.'"><img src="images/scenehd.png" /></a></td>';
}// ##################################################

// 	##################################################
// 	Generate BinSearch Link
if ($feature_binsearch_link == TRUE) {
echo '<td><a href="http://www.binsearch.info/?q='.$release_name.'&max=250&adv_age=365="><img src="images/binsearch.png" /></a></td>';
}// ##################################################

// 	##################################################
// 	Generate GotNZB4U x264 Search Link
if ($feature_gotnzb4u_x264_link == TRUE) {
echo '<td><a href="http://www.gotnzb4u.me.uk/x264/requests.php?release='.$release_name.'&age=365&status=FILLED&sort=FILLED&reverse=on"><img src="images/gotnzb4u.png" /></a></td>';
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

echo '</tr>'; // close the last row.
} // This is the end of the foreach loop.
  // PHP will now return and find the next release to manage.
echo '</table>'; // Now we're outside the loop, close the table..

// 	##################################################
// 	Footer
require("includes/footer.php");
//	##################################################

?>