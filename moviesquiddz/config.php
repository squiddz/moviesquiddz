<?php // config.php

// ####################################################
// Select which features to enable.
// [ Set the value to "TRUE" or "FALSE" respectively. ]
// More info available here:
// http://wiki.github.com/squiddz/moviesquiddz/features
// ###################################################

// Debug Mode.
$msDebug = TRUE;

// Basic Features
$show_release_name = FALSE; // Show release name.
$show_movie_name = TRUE; // Show movie name.
$show_movie_year = TRUE; // Show movie year.
$show_group_name = TRUE; // Show releasegroup name.

// Movie Site Links
$show_imdb_link = TRUE; // Show IMDB popup links.
$show_imdb_search_link = FALSE; // Show IMDB manual search links.
$show_rt_link = TRUE; // Show Rotten Tomatoes search links.

// Scene Related Links
$show_nfo_link = TRUE; // Show NFO links.
$show_rescene_link = TRUE; // Show ReScene links.
$show_orly_link = TRUE; // Show ORLYPreDB links.

// FileSharing/Download Links
$show_scenehd_link = FALSE; // Show simple SceneHD search links.
$show_scenehd_reseed = TRUE; // Show SceneHD availability and links.
$show_binsearch_link = TRUE; // Show BinSearch links.
$show_gotnzb4u_x264_link = TRUE; // Show GotNZB4U search links.

// Other [Misc.] Features
$sort_list = TRUE; // Sort FileList.
$show_detect_scene = TRUE; // Show scene/non-scene.
$show_subsource_link = TRUE; // Show SubtitleSource links.
$show_local_folder_link = FALSE; // Show "Open Locally" links.
$show_tag_meanings = TRUE; // Show links to tag meanings at SceneLingo.

// ####################################################
// Set the location of your lists.
// ####################################################

$file_listing_location='files/FileListing.txt'; // http://dl.getdropbox.com/u/788363/Random%20Stuff/FileListing.txt See http://cloud.github.com/downloads/squiddz/moviesquiddz/FileListing.txt
$scene_group_list_location='files/SceneGroups.txt';
$release_dirs = '../release_dir_1';	// array("../release_dir_1","../release_dir_1"); // Release directories. [ UNSTABLE ]
$scenehd_url = 'https://scenehd.org/'; // ie http://scenehd.org/ or http://www.scenehd.org/ or https://scenehd.org/ or https://www.scenehd.org/
$scenehd_list_location = 'files/SceneHDList.txt'; // http://scenehd.org/list
$scenehd_reqlist_location = 'files/SceneHDReqList.txt'; // http://scenehd.org/reqlist
$gotnzb4u_requests_location='files/requests-list.txt'; // http://www.gotnzb4u.me.uk/x264/requests.php?age=365&status=FILLED
$other_tags_location='files/OtherTags.txt'; // http://cloud.github.com/downloads/squiddz/moviesquiddz/OtherTags.txt

?>