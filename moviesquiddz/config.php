<?php

//	SEE "README.TXT" BEFORE CONTINUING!

//	##################################################
//				CONFIGURATION
//	##################################################

// Enable/Disable Debug Mode
$msDebug = TRUE;

//	Set the location of your list files:

$file_listing_location='files/FileListing.txt';
$scene_group_list='files/SceneGroups.txt';
$other_tags='files/OtherTags.txt';
$release_dirs = '../release_dir_1';	// array("../release_dir_1","../release_dir_1"); // Release directories. [ UNSTABLE ]
$scenehd_list_location = 'files/SceneHDList.txt'; // 'http://scenehd.org/list';
$scenehd_reqlist_location = 'files/SceneHDReqList.txt'; // 'http://scenehd.org/reqlist';
$gotnzb4u_requests_location='files/requests-list.txt';

	
//	##################################################
//	Select which features to enable.
//	Set the value to "TRUE" or "FALSE" respectively.
//	Some of these functions require PHP5 or greater.
//	##################################################
	
$feature_sort_list 			= 	TRUE; 	// Disable this to leave releases in the order supplied in the text file.
$feature_detect_scene 		= 	TRUE; 	// Adds a tick or cross depending on whether the group is Scene.	

// Movie Site Links
$feature_imdb_link 			= 	TRUE; 	// Link to AJAX popup list of suggested IMDB titles. [http://www.imdb.com/].
$feature_imdb_search_link 	= 	FALSE; 	// Link to direct IMDB movie search. [Grey IMDB logo].
$feature_rt_link 			= 	TRUE; 	// Link to Rotten Tomatoes search [http://www.rottentomatoes.com/].

// Scene Related Links
$feature_nfo_link 			= 	TRUE; 	// Link to _______ for NFOs.
$feature_rescene_link 		= 	TRUE; 	// Link to ReScene.Info [http://rescene.info/].
$feature_orly_link			=	TRUE;	// Link to ORLYdb - check nuke status, size and file-count. [http://www.orlydb.com/]

// FileSharing Links
$feature_scenehd_link		=	FALSE;	// Basic SceneHD.org search. Pointless when used in conjunction with feature_scenehd_reseed.
$feature_scenehd_reseed		=	TRUE;	// As above, but checks torrent status and changed logo colour accordingly. 
$feature_binsearch_link		=	TRUE;	// Link to BinSearch NZB Search engine [http://www.binsearch.info/].
$feature_gotnzb4u_x264_link	=	TRUE;	// Link to GotNZB4U x264 [http://www.gotnzb4u.me.uk/x264/].

// Other
$feature_subsource_link		=	TRUE;	// Link to SubtitleSource Search [http://www.subtitlesource.org/].
$feature_local_folder_link	=	TRUE;	// [ UNSTABLE ] Link to local folder containing release.
$show_tag_meanings			=	TRUE;	// Show a list of scene tags in footer, linked to scenelingo.

?>