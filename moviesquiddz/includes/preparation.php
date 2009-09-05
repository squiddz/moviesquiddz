<?php

//	Convert files into arrays for use in the script.
$all_releases = file($file_listing_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if (phpversion() < '5.3.0') { $all_releases = fix_array($all_releases); };

$scene_groups_array = file($scene_group_list_location,FILE_IGNORE_NEW_LINES);
if (phpversion() < '5.3.0') { $scene_groups_array = fix_array($scene_groups_array); };

$tags = file($other_tags_location,FILE_IGNORE_NEW_LINES);
if (phpversion() < '5.3.0') { $tags = fix_array($tags); };
rsort($tags); // reverse sort, to fix errors like the "HDDVD" -> "HDDVDRip" anomaly.

$gotnzb4u_requests = file_get_contents($gotnzb4u_requests_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 	Create Table Top Row
echo '<table class="sortable" border="1">'."\n".'<tr><th><strong>Name</strong></th>';
if ($show_movie_name) {echo'<th>Movie Name</th>';};
if ($show_group_name) {echo'<th>Group Name</th>';};
if ($feature_detect_scene) {echo'<th><img src="images/question.png" alt="S" title="Scene [tick] or Non-Scene [cross]" /></th>';};
if ($feature_imdb_link) {echo'<th class="sorttable_nosort"><img src="images/imdb.png" alt="IMDB" title="IMDB Popup Links" /></a></th>';};
if ($feature_imdb_search_link) {echo'<th class="sorttable_nosort"><img src="images/imdb_grey.png" alt="IMDB" title="IMDB External Search Links" /></a></th>';};
if ($feature_rt_link) {echo'<th class="sorttable_nosort"><img src="images/rt.png" alt="RT" title="Rotten Tomatoes Search Links" /></th>';};
if ($feature_nfo_link) {echo'<th class="sorttable_nosort"><img src="images/info.png" alt="NFO" title="NFO Links" /></th>';};
if ($feature_rescene_link) {echo'<th class="sorttable_nosort"><img src="images/rescene.png" alt="RS" title="ReScene Links" /></th>';};
if ($feature_orly_link) {echo'<th class="sorttable_nosort"><img src="images/orly.png" alt="ORLY" title="ORLY PreDB Links" /></th>';};
if ($feature_scenehd_link) {echo'<th class="sorttable_nosort"><img src="images/scenehd.png" alt="SceneHD" title="SceneHD.org Links" /></th>';};
if ($feature_scenehd_reseed) {echo'<th><img src="images/scenehd-bw.png" alt="SceneHD" title="SceneHD.org Links" /></th>';};
if ($feature_binsearch_link) {echo'<th class="sorttable_nosort"><img src="images/binsearch.png" alt="BinSearch" title="BinSearch NZB Links" /></th>';};
if ($feature_gotnzb4u_x264_link) {echo'<th><img src="images/gotnzb4u.png" alt="GotNZB4U" title="GotNZB4U x264 Links" /></th>';};
if ($feature_subsource_link) {echo'<th class="sorttable_nosort"><img src="images/subtitlesource.png" alt="SubSource" title="SubtitleSource Link" /></th>';};
if ($feature_local_folder_link) {echo'<th class="sorttable_nosort"><img src="images/open_folder.png" alt="Open" title="Open Folder Locally" /></th>';};
echo '</tr>'."\n";

// 	Sort List Alphabetically
if ($feature_sort_list) { sort($all_releases); } // sort the releases alphabetically

// 	Grab and manage the SceneHD list
if ($feature_scenehd_reseed) {
	// Generate an array from the file listing on scenehd.
	$scenehd_list = file($scenehd_list_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$scenehd_reqlist = file($scenehd_reqlist_location,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
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
	if (phpversion() < '5.3.0') { $scenehd_list = fix_array($scenehd_list); };
	if (phpversion() < '5.3.0') { $scenehd_reqlist = fix_array($scenehd_reqlist); };
}	// now we have complete arrays of releases and requests.

?>