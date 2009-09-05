<?php

echo "\n\n".'<div id="footer">';

//	##################################################
// 	Show tag meanings
if ($show_tag_meanings == TRUE) {
include("includes/show_tag_meanings.php");
}// ##################################################

if ($feature_scenehd_reseed == TRUE) {
echo "\n\n<h2>SceneHD</h2>";
echo "\n".'<p>There are currently '.$scenehd_list_num.' releases, and '.$scenehd_reqlist_num.' requests on <a href="#">scenehd.org</a>.</p>';
echo "\n".'<p><img src="images/scenehd.png" alt="SceneHD" title="SceneHD | All OKAY" /> <strong>All OKAY</strong>: Release is on SceneHD and has seeders.<br />';
echo "\n".'<img src="images/scenehd-yellow.png" alt="SceneHD" title="SceneHD | Not Found" /> <strong>Not Found</strong>: Release was not found. You should check it is not in a pack, then upload it.<br />';
echo "\n".'<img src="images/scenehd-blue.png" alt="SceneHD" title="SceneHD | Requested" /> <strong>Requested</strong>: Release has been requested on SceneHD. Please upload!<br />';
echo "\n".'<img src="images/scenehd-red.png" alt="SceneHD" title="SceneHD | Dead" /> <strong>Dead</strong>: Release is on SceneHD but has no seeders. Please Re-Seed!</p>';

};

if ($feature_gotnzb4u_x264_link == TRUE) {
echo "\n\n<h2>GotNZB4U</h2>";
echo "\n".'<p>Grab the <a href="#">UserScript</a> for Firefox+Greasemonkey, then <a href="http://www.gotnzb4u.me.uk/forum/login.php">login</a> to gotnzb4u.me.uk to improve GotNZB4U link usability.</p>';
}

echo "\n\n<h2>Sorting</h2>";
echo "\n".'<p>Remember, you can click the titles of some columns to sort them.</p>';

echo "\n\n<h2>OtherInfo</h2>";

echo "\n".'<p>Page built by <strong><a href="http://wiki.github.com/squiddz/moviesquiddz">MovieSquiddz</a></strong>'."\n";
echo ' [ <a href="includes/preferences.php" onclick="return hs.htmlExpand(this, { objectType: '."'".'ajax'."'".', width: '."'".'750'."'".', headingText: '."'".'MovieSquiddz Preferences [Not Working Yet]'."'".', wrapperClassName: '."'".'titlebar'."'".' } )"><del>Preferences</del></a> ]</p>';

echo '<p>You have <em>'.count($all_releases).'</em> releases.</p>';

// WARNINGS
// You own a requested release from SceneHD:
if($warning_scenehd_request) {echo '<div class="warningbar" id="warningbar-scenehd"><span class="left"><strong>Warning!</strong> One or more of your releases has been requested on SceneHD. This is represented by <img src="images/scenehd-blue.png" class="lowdown" />.</span><span class="right"><a href="javascript:RemoveContent('."'".'warningbar-scenehd'."'".')"><img src="images/cross.png" class="lowdown" /></a></span></div>';};

if ($msDebug == TRUE) {
	echo "\n\n<h2>[ DebugInfo ]</h2>";
	echo  "\n<p>To hide additional information, disable ".'$msDebug'." in <em>config.php</em>.</p>\n";
};

echo "</div><!-- end footer -->\n\n</body>\n</html>";
?>