<?php

// Convert release name to movie name.
// ... whilst saving groupname and storing stripped tags.
// NOTE: Works in 5.3.0 only...  NO idea why!

// First cut the release group off the end...
$splitRelease = explode('-',$release_name); // split the release at the "-".

// The part after the dash is the groupname.
$group_name = $splitRelease[1];
// alternatively... $group_name = array_pop(explode('-',$release_name));

// Take the first section only.
$hacked_release_name = $splitRelease[0];

// Go through each of the scene tags one by one...
foreach ($tags as $tag) {
	
	// Define the regular expression...
	$regex = '/\.'.$tag.'/i';
	
	//$numberoftimesthereplacementwasmade = 0; 
	
	// Replace any instance of the regex with '' (nothing).
	// Simultaneously, output the number of replacements made.
	$hacked_release_name = preg_replace($regex, '', $hacked_release_name,-1,$num_of_replacements_made);
	
	// If at least one replacement was made, we want to add the current tag to an array of used tags.
	// num_of_replacements_made is not zero, and show_tag_meanings is enabled...
	if ($num_of_replacements_made != 0 && $show_tag_meanings == TRUE){
		
		// append $tag to $tag_stack array...
		$tag_stack[] = $tag;
		// Note: array_push(); is not used because it requires a predefined array.
		// Caution: This method will eventually result in an extremely large array, with many duplicates.
		
	} // end if.
} // end foreach.

// We want to do the same with episode numbers... S01E01 etc.
// I think we can assume it will not exceed S39 nor E59!
// Define a new regex.
$regex = '/\.S[0-3]\dE[0-5]\d/i';
// Note: "\d" - Matches any numeric character - same as [0-9]
// and "/i" makes it case insensitive...

// Then do a reqular expression replacement, as before.
$hacked_release_name = preg_replace($regex, '', $hacked_release_name);

// ... and finally with years... ie 4 consecutive numbers where the first is 1 or 2.
$regex = '/\.[1-2]\d\d\d/';
$hacked_release_name = preg_replace($regex, '', $hacked_release_name);

// Finally, we convert dots in the movie_name to spaces..
// which are handled by search engines more effectively.
$movie_name = str_replace("."," ",$hacked_release_name);

?>