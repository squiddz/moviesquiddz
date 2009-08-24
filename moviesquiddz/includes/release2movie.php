<?php

// Define function: "release2movie".
// ...to snip the Release name to the length of the movie title - removing all the details, (resolution, group.name etc.)

function release2movie($release_name, $tags) {

	// First cut the release group off the end...
	$splitRelease = explode('-',$release_name); // split the release at the "-". 
	$release_name = $splitRelease[0]; // take only the first part (before first dash)
	
	// the following works in 5.3.0 only...  NO idea why!
	foreach ($tags as $tag) {
		$regex = '/\.'.$tag.'/i'; // set the regular expressions..
		$release_name = preg_replace($regex, '', $release_name);
	}	// where /i makes it case insensitive...
	
	// We want to do the same with episode numbers... S01E01 etc.
	// I think we can assume it will not exceed S39 nor E59!
	// Note: "\d" - Matches any numeric character - same as [0-9]
	$regex = '/\.S[0-3]\dE[0-5]\d/i';
	$release_name = preg_replace($regex, '', $release_name);
	
	// ... and with years... ie 4 consecutive numbers...
	// must start with 1 or 2.
	// second third and fourth characters can be 0-9.
	// we don't need case insensitivity here either!
	$regex = '/\.[1-2]\d\d\d/';
	$release_name = preg_replace($regex, '', $release_name);
	
	// We also want to return the movie name with spaces, as IMDb and (especially) RottenTomatoes handles dotted search terms badly.
	$movie_name = str_replace(".","+",$release_name);
	
	return $movie_name;
}

?>