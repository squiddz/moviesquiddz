<?php

//	##################################################
// 	Show tag meanings
if ($show_tag_meanings == TRUE) {
include("includes/show_tag_meanings.php");
}// ##################################################

if ($feature_scenehd_reseed == TRUE) {
echo "\n".'<p><strong>SceneHD Info:</strong> There are currently '.$scenehd_list_num.' releases, and '.$scenehd_reqlist_num.' requests.</p>';
echo "\n".'<p><img src="images/scenehd.png" alt="SceneHD" title="SceneHD | All OKAY" /> <strong>All OKAY</strong>: Release is on SceneHD and has seeders.<br />';
echo "\n".'<img src="images/scenehd-yellow.png" alt="SceneHD" title="SceneHD | Not Found" /> <strong>Not Found</strong>: Release was not found. You should check it is not in a pack, then upload it.<br />';
echo "\n".'<img src="images/scenehd-blue.png" alt="SceneHD" title="SceneHD | Requested" /> <strong>Requested</strong>: Release has been requested on SceneHD. Please upload!<br />';
echo "\n".'<img src="images/scenehd-red.png" alt="SceneHD" title="SceneHD | Dead" /> <strong>Dead</strong>: Release is on SceneHD but has no seeders. Please Re-Seed!</p>';
};

echo "\n".'<p>[ <del><a href="includes/preferences.php">Preferences</a></del> ]</p>';

echo "\n\n".'<div id="footer">'."\n".'<p>Page built by <strong><a href="http://wiki.github.com/squiddz/moviesquiddz">MovieSquiddz</a></strong>';

if ($msDebug == TRUE) {
	if (phpversion() < '5.3.0') {
		echo  "\n".'<p><strong>Note:</strong> Currently several features require PHP >= 5.3.0. You have '.phpversion().' so there may be issues.</p>';
	};
	echo  "\n<p>To hide these details, disable debug mode in <em>config.php</em>.</p>\n";
	} else {
	echo  "</p>\n";
};

echo "</div>\n\n</body>\n</html>";
?>