<?php

//	##################################################
// 	Show tag meanings
if ($show_tag_meanings == TRUE) {
include("includes/show_tag_meanings.php");
}// ##################################################

echo '[ <a href="includes/preferences.php">Preferences</a> ]';

echo "\n\n".'<div id="footer">'."\n\t".'<p>Page built by <strong><a href="http://github.com/squiddz/moviesquiddz/">MovieSquiddz</a></strong>';

if ($msDebug == TRUE) {
	echo  ' v <strong>'.$msVersion.'</strong></p>';
	if (phpversion() < '5.3.0') {
		echo  "\n\t".'<p><strong>Note:</strong> Currently several features require PHP >= 5.3.0. You have '.phpversion().' so there may be issues.</p>';
	};
	echo  "\n\t<p>To hide these details, disable debug mode in <em>config.php</em>.</p>\n";
	} else {
	echo  "</p>\n";
};

echo "</div>\n\n</body>\n</html>";
?>