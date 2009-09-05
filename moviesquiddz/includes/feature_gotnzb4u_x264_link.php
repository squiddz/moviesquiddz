<?php // Feature: Generate GotNZB4U x264 Search Link
// or display different (grey) image if not found on the site.

// Search $gotnzb4u_requests for $release_name.
if (stripos($gotnzb4u_requests,$release_name) !== FALSE) { // if there's a match...
	echo '<td sorttable_customkey="1"><a href="http://www.gotnzb4u.me.uk/x264/requests.php?release='.$release_name.'&age=365&status=FILLED&sort=FILLED&reverse=on"><img src="images/gotnzb4u.png" /></a></td>';
} else {
	echo '<td sorttable_customkey="2"><img src="images/gotnzb4u-bw.png" /></td>';
}

?>