<?php // Feature: Generate GotNZB4U x264 Search Link
// or display different (grey) image if not found on the site.

// if the release_name string is found, preg_match will give 1. If not, 0.
$pattern = '/'.$release_name.'/';
if (preg_match($pattern,$gotnzb4u_requests) == 1) {// if there's a match
	echo '<td sorttable_customkey="1"<a href="http://www.gotnzb4u.me.uk/x264/requests.php?release='.$release_name.'&age=365&status=FILLED&sort=FILLED&reverse=on"><img src="images/gotnzb4u.png" /></a></td>';
} else {
	echo '<td sorttable_customkey="2"<img src="images/gotnzb4u-bw.png" /></td>';
}

?>