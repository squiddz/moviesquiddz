<?php // preparation.php

//	Convert files into arrays for use in the script.




//print_r ($_FILES['FileListing']['error']);
//print_r ($_FILES['OtherTags']['error']);
//print_r ($_FILES['SceneGroups']['error']);

//echo 'Files:';
//print_r ($_FILES);


if (!empty($_FILES)) {
	
	// Check for FileListing.txt
	if ($_FILES['FileListing']['error'] == 0) {
		$file_listing_location = $_FILES['FileListing']['tmp_name'];
	} else {
		echo 'Note: You should upload your own FileListing.txt. Shown below is just an example.<br />';
	}
	
	// Check for SceneGroups.txt
	if ($_FILES['SceneGroups']['error'] == 0) {
		$scene_group_list_location = $_FILES['SceneGroups']['tmp_name'];
	} else {
		echo 'Note: You did not upload a SceneGroups.txt file, so default was used.<br />';
	}
	
	// Check for OtherTags.txt
	if ($_FILES['OtherTags']['error'] == 0) {
		$other_tags_location = $_FILES['OtherTags']['tmp_name'];
	} else {
		echo 'Note: You did not upload an OtherTags.txt file, so default was used.<br />';
	}

} else {
	echo 'Note: You did not upload any files. Defaults will be used.<br />';
}


$all_releases = file($file_listing_location,FILE_IGNORE_NEW_LINES);
$scene_groups_array = file($scene_group_list_location,FILE_IGNORE_NEW_LINES);
$tags = file($other_tags_location,FILE_IGNORE_NEW_LINES);

if (phpversion() < '5.3.0') {
$all_releases = fix_array($all_releases);
$scene_groups_array = fix_array($scene_groups_array);
$tags = fix_array($tags);
};

rsort($tags); // reverse sort, to fix errors like the "HDDVD" -> "HDDVDRip" anomaly.

$gotnzb4u_requests = file_get_contents($gotnzb4u_requests_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Replace the default config options with the POST preferences from preferences.php... if they exist.

//echo 'Post:';
//print_r ($_POST);


if (!empty ($_POST)) {
$show_movie_name = $_POST["show_movie_name"];
$show_movie_year = $_POST["show_movie_year"];
$show_group_name = $_POST["show_group_name"];
$show_imdb_link = $_POST["show_imdb_link"];
$show_imdb_search_link = $_POST["show_imdb_search_link"];
$show_rt_link = $_POST["show_rt_link"];
$show_nfo_link = $_POST["show_nfo_link"];
$show_rescene_link = $_POST["show_rescene_link"];
$show_orly_link = $_POST["show_orly_link"];
$show_scenehd_link = $_POST["show_scenehd_link"];
$show_scenehd_reseed = $_POST["show_scenehd_reseed"];
$show_binsearch_link = $_POST["show_binsearch_link"];
$show_gotnzb4u_x264_link = $_POST["show_gotnzb4u_x264_link"];
$sort_list = $_POST["sort_list"];
$show_detect_scene = $_POST["show_detect_scene"];
$show_subsource_link = $_POST["show_subsource_link"];
$show_local_folder_link = $_POST["show_local_folder_link"];
$show_tag_meanings = $_POST["show_tag_meanings"];

$scenehd_url = $_POST["scenehd_url"];

$msDebug = $_POST["msDebug"];

} else {
	echo 'You did not select which features to enable. "config.php" has been used instead.<br />';
}

// 	Create Table Top Row
echo '<table class="sortable" border="1" >'."\n".'<tr>';
if ($show_release_name) {echo '<th class="sorttable_alpha"><strong>Name</strong></th>';};
if ($show_movie_name) {echo'<th class="sorttable_alpha">Movie Name</th>';};
if ($show_movie_year) {echo'<th>Year</th>';};
if ($show_group_name) {echo'<th class="sorttable_alpha">Group Name</th>';};
if ($show_detect_scene) {echo'<th><img src="images/question.png" alt="S" title="Scene [tick] or Non-Scene [cross]" /></th>';};
if ($show_imdb_link) {echo'<th class="sorttable_nosort"><img src="images/imdb.png" alt="IMDB" title="IMDB Popup Links" /></th>';};
if ($show_imdb_search_link) {echo'<th class="sorttable_nosort"><img src="images/imdb_grey.png" alt="IMDB" title="IMDB External Search Links" /></th>';};
if ($show_rt_link) {echo'<th class="sorttable_nosort"><img src="images/rt.png" alt="RT" title="Rotten Tomatoes Search Links" /></th>';};
if ($show_nfo_link) {echo'<th class="sorttable_nosort"><img src="images/info.png" alt="NFO" title="NFO Links" /></th>';};
if ($show_rescene_link) {echo'<th class="sorttable_nosort"><img src="images/rescene.png" alt="RS" title="ReScene Links" /></th>';};
if ($show_orly_link) {echo'<th class="sorttable_nosort"><img src="images/orly.png" alt="ORLY" title="ORLY PreDB Links" /></th>';};
if ($show_scenehd_link) {echo'<th class="sorttable_nosort"><img src="images/scenehd.png" alt="SceneHD" title="SceneHD.org Links" /></th>';};
if ($show_scenehd_reseed) {echo'<th><img src="images/scenehd-bw.png" alt="SceneHD" title="SceneHD.org Links" /></th>';};
if ($show_binsearch_link) {echo'<th class="sorttable_nosort"><img src="images/binsearch.png" alt="BinSearch" title="BinSearch NZB Links" /></th>';};
if ($show_gotnzb4u_x264_link) {echo'<th><img src="images/gotnzb4u.png" alt="GotNZB4U" title="GotNZB4U x264 Links" /></th>';};
if ($show_subsource_link) {echo'<th class="sorttable_nosort"><img src="images/subtitlesource.png" alt="SubSource" title="SubtitleSource Link" /></th>';};
if ($show_local_folder_link) {echo'<th class="sorttable_nosort"><img src="images/open_folder.png" alt="Open" title="Open Folder Locally" /></th>';};
echo '</tr>'."\n";

// 	Sort List Alphabetically
if ($sort_list) { sort($all_releases); } // sort the releases alphabetically

// 	Grab and manage the SceneHD list
if ($show_scenehd_reseed) {
	// Generate an array from the file listing on scenehd.
	$scenehd_list = file($scenehd_list_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$scenehd_reqlist = file($scenehd_reqlist_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	if (phpversion() < '5.3.0') { $scenehd_list = fix_array($scenehd_list); };
	if (phpversion() < '5.3.0') { $scenehd_reqlist = fix_array($scenehd_reqlist); };
	// We need to remove the <br> and <br /> from the end of the lines, respectively.
	// no idea why they're not consistent!
	$scenehd_list = preg_replace('/<br \/>/', '', $scenehd_list);
	$scenehd_reqlist = preg_replace('/<br>/', '', $scenehd_reqlist);
	// Extract the first line of the file (number of releases found..)
	// reset($array); is probably not necessary, as we're already on the first element.
	$scenehd_list_num = $scenehd_list[0];
	$scenehd_reqlist_num = $scenehd_reqlist[0];
	// destroy the first element of the array
	unset($scenehd_list[0]);
	unset($scenehd_reqlist[0]);
}	// now we have complete arrays of releases and requests.

?>