<?php

// Define function: "release2movie".
// ...to snip the Release name to the length of the movie title - removing all the details, (resolution, group.name etc.)

function release2movie($release_name, $tags) {

	// First things first, define which variables will be global.
	global $tag_stack;
	
	
	// First cut the release group off the end...
	$splitRelease = explode('-',$release_name); // split the release at the "-". 
	$release_name = $splitRelease[0]; // take only the first part (before first dash)
	
	// the following works in 5.3.0 only...  NO idea why!
	foreach ($tags as $tag) {
		$regex = '/\.'.$tag.'/i'; // set the regular expressions..

		// At this point, we want to record all the matching tags in a new array.
		// First determine whether there's a match...
		// search release name for the tag...
		// array_push(); is not used because it requires a predefined array.
		// NOTE: the method used will result eventually in an extremely large array, with many duplicates.
		//}

		$numberoftimesthereplacementwasmade = 0; 
		$release_name = preg_replace($regex, '', $release_name,-1,$numberoftimesthereplacementwasmade);
		
		if ($numberoftimesthereplacementwasmade != 0) {
		// ie if at least one was made..
		
		// append $tag to array, for later use in show_tag_meanings.
		$tag_stack[] = $tag;
		// due to the way in which this function will be called more than once,
		// if a
		
		// might be more efficient to use...
		// if ($numberoftimesthereplacementwasmade != 0 && $show_tag_meanings == TRUE) {
		// but that'd need global variable or something, and it might just be better to
		// create the tag_stack array regardless.
		
		}
	}	
	
	// We want to do the same with episode numbers... S01E01 etc.
	// I think we can assume it will not exceed S39 nor E59!
	// Note: "\d" - Matches any numeric character - same as [0-9]
	// and "/i" makes it case insensitive...
	$regex = '/\.S[0-3]\dE[0-5]\d/i';
	
	$release_name = preg_replace($regex, '', $release_name);
	
	// ... and with years... ie 4 consecutive numbers starting 1 or 2.
	// second, third and fourth characters can be 0-9.
	// we don't need case insensitivity here either!
	$regex = '/\.[1-2]\d\d\d/';
	$release_name = preg_replace($regex, '', $release_name);
	
	// We also want to return the movie name with spaces, as IMDb and (especially) RottenTomatoes handles dotted search terms badly.
	$movie_name = str_replace(".","+",$release_name);
	
	return $movie_name;
}

?>