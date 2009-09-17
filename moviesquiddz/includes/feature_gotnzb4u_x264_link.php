<?php // feature_gotnzb4u_x264_link.php

// Search $gotnzb4u_requests for $release_name.
if (stripos($gotnzb4u_requests,$release_name) !== FALSE) { // if there's a match...
	echo '<td sorttable_customkey="1"><a href="http://www.gotnzb4u.me.uk/x264/requests.php?release='.$release_name.'&amp;age=365&amp;status=FILLED&amp;sort=FILLED&amp;reverse=on"><img src="images/gotnzb4u.png" alt="GotNZB4U" /></a></td>';
} else {
	echo '<td sorttable_customkey="2"><img src="images/gotnzb4u-bw.png" alt="GotNZB4U" /></td>';
}

?>