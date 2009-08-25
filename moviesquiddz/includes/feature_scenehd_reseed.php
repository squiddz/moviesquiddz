<?php // Feature: SceneHD Reseed.

// This module compares the release with the list from scenehd.org/list
// to show whether a release is uploaded, needs reseeding or whatever.


foreach ($scenehd_list as $scenehd_release) {

	// if strpos does not return FALSE, it means it's found on scenehd already.
	if ( strpos($scenehd_release,$release_name) !== false ) {
	
		// at this point, we want to break out of the loop.
		break;
	
	} else { // ... if it's not found...
	
		unset($scenehd_release);
	
	}
}

// at this point, scenehd_release will look like...
// Smallville.S07.720p.Bluray.x264-SceneHD###TV/720###18761###1
// or it will not be set at all..

// if it is set...
if (isset($scenehd_release)) {

	// we need to extract the number at the end (0 or 1)
	// because 0 means it's not seeded, 1 means it is.
	
	// first explode the string
	$scenehd_release_exploded = explode('###',$scenehd_release);
	
	// then "18761" (torrent id) in the example above will be... $scenehd_release_exploded[2]
	// and "1" (or "0") will be... $scenehd_release_exploded[3]

	// if it has no seeds...
	if ($scenehd_release_exploded[3] == 0) { 
	
		// we need to take the torrent id and make a link.
		echo '<td><a href="https://scenehd.org/details.php?id='.$scenehd_release_exploded[2].'"><img src="images/scenehd-red.png" /></a></td>'; // Dead
	
	} else { // it is seeded.
	
		echo '<td><a href="https://scenehd.org/details.php?id='.$scenehd_release_exploded[2].'"><img src="images/scenehd.png" /></a></td>'; // All OKAY
	
	}
	
} else { // it is NOT set - release was not found.

	// it is not uploaded on scenehd..
	// so lets check the requests for it too.
	
	// if release_name occurs in request array,
	// that is, if release_name is found in requestlist...
	// in_array($needle,$haystack);
	if (in_array($release_name,$scenehd_reqlist) == TRUE) {
	
		// release is requested - please upload!
		// generate link to search result for that request.
		echo '<td><a href="https://scenehd.org/requests.php?search='.$release_name.'"><img src="images/scenehd-blue.png" /></a></td>'; // Requested
	} else {
	// it's not in requests either
	// so it's not on scenehd at all. Please upload it!	
	// note, it could still be in a pack somewhere on scenehd,
	// ... so search those too before uploading!
	echo '<td><img src="images/scenehd-yellow.png" /></td>'; // Not Found

}

}
?>