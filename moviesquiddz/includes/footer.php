<?php // footer.php

echo "\n\n";
echo '<div id="footer">';
echo "\n";

//	##################################################
// 	Show tag meanings
if ($show_tag_meanings) {
include("includes/show_tag_meanings.php");
}// ##################################################

if ($show_scenehd_reseed) {
echo "\n\t";
echo '<h2>SceneHD</h2>';
echo "\n\t";
echo '<p>There are currently <em>'.$scenehd_list_num.'</em> releases, and <em>'.$scenehd_reqlist_num.'</em> requests on <a href="'.$scenehd_url.'">scenehd.org</a>.</p>';
echo "\n\t";
echo '<h3>Key:</h3>';
echo "\n\t";
echo '<p>';
echo "\n\t\t";
echo '<img src="images/scenehd.png" alt="SceneHD" title="SceneHD | All OKAY" /> <strong>All OKAY</strong>: Release is on SceneHD and has seeders.<br />';
echo "\n\t\t";
echo '<img src="images/scenehd-yellow.png" alt="SceneHD" title="SceneHD | Not Found" /> <strong>Not Found</strong>: Release was not found. You should check it is not in a pack, then upload it.<br />';
echo "\n\t\t";
echo '<img src="images/scenehd-blue.png" alt="SceneHD" title="SceneHD | Requested" /> <strong>Requested</strong>: Release has been requested on SceneHD. Please upload!<br />';
echo "\n\t\t";
echo '<img src="images/scenehd-red.png" alt="SceneHD" title="SceneHD | Dead" /> <strong>Dead</strong>: Release is on SceneHD but has no seeders. Please Re-Seed!';
echo "\n\t";
echo '</p>';
};

if ($show_gotnzb4u_x264_link) {
echo "\n\n\t";
echo '<h2>GotNZB4U</h2>';
echo "\n\t";
echo '<p>Grab the <a href="#">UserScript</a> for Firefox+Greasemonkey, then <a href="http://www.gotnzb4u.me.uk/forum/login.php">login</a> to gotnzb4u.me.uk to improve GotNZB4U link usability.</p>';
}

echo "\n\n\t";
echo '<h2>Sorting</h2>';
echo "\n\t";
echo '<p>Remember, you can click the titles of some columns to sort them.</p>';

echo "\n\n\t";
echo '<h2>OtherInfo</h2>';
echo "\n\t";
echo '<p>Page built by <strong><a href="http://wiki.github.com/squiddz/moviesquiddz">MovieSquiddz</a></strong>';
echo "\n\t";
echo '[ <a href="includes/preferences.php"><del>Preferences</del></a> ]</p>';
echo "\n\t";
echo '<a href="http://jigsaw.w3.org/css-validator/check/referer/"><img src="images/css-icon.gif" alt="CSS" /></a> <a href="http://validator.w3.org/check/referer"><img src="images/xhtml-icon.gif" alt="XHTML" /></a>';
echo "\n\t";
echo '<p>You have <em>'.count($all_releases).'</em> releases.</p>';

// WARNINGS
// You own a requested release from SceneHD:
if($warning_scenehd_request) {echo '<div class="warningbar" id="warningbar-scenehd"><span class="left"><strong>Warning!</strong> One or more of your releases has been requested on SceneHD. This is represented by <img src="images/scenehd-blue.png" alt="SHD-Blue" class="lowdown" />.</span><span class="right"><a href="javascript:RemoveContent('."'".'warningbar-scenehd'."'".')"><img src="images/cross.png" alt="Close" class="lowdown" /></a></span></div>';};

if ($msDebug) {
	echo "\n\n\t";
	echo '<h2>[ DebugInfo ]</h2>';
	echo "\n\t";
	echo  '<p>To hide additional information, disable "$msDebug" in <em>config.php</em>.</p>';
	echo "\n";
};

echo "\n";
echo '</div><!-- end footer -->';
echo "\n\n";
echo '</body>';
echo "\n";
echo '</html>';
?>