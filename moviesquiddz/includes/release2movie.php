<?php // release2movie.php

// Convert release name to movie name.
// ... whilst saving groupname and storing stripped tags.

// eg 1: 	$release_name = "7eventy.5ive.2007.STV.720p.BluRay.x264-HDEX";
//			... gives ...
//			$movie_name = "7eventy 5ive";
//			$group_name = "HDEX";
//			... and adds "STV","720p","BluRay","x264" tags to the $tag_stack array.

// eg 2: 	$release_name = "The.Good.The.Bad.and.The.Ugly.1966.2Disc.AC3D.5.1.720p.HDTV.x264.READ.NFO-4HM";
//			... gives ...
//			$movie_name = "The Good The Bad and The Ugly";
//			$group_name = "4HM";
//			... and adds "2Disc","AC3D.5.1","720p","HDTV","x264","READ.NFO" tags to the $tag_stack array.

// This is necessarily complicated, to handle releases with more than one dash in the name.
// eg. WALL-E.720p.BluRay.x264-iNFAMOUS

// First, grab the release group off the end...
$exploded_release_name = explode('-',$release_name);

$group_name = array_pop($exploded_release_name);

$hacked_release_name = implode('-',$exploded_release_name);

foreach ($tags as $tag) {
	
	// Define the regular expression...
	$regex = '/\.'.$tag.'/i';
	
	// Replace any instance of the regex with '' (nothing).
	// Simultaneously, output the number of replacements made.
	$hacked_release_name = preg_replace($regex, '', $hacked_release_name,-1,$num_of_replacements_made);
	
	// If at least one replacement was made, we want to add the current tag to an array of used tags.
	// num_of_replacements_made is not zero, and show_tag_meanings is enabled...
	if ($num_of_replacements_made != 0 && $show_tag_meanings){
		
		// append $tag to $tag_stack array...
		$tag_stack[] = $tag;
		// Note: array_push(); is not used because it requires a predefined array.
		// Caution: This method will eventually result in an extremely large array, with many duplicates.
		
	} // end if.
} // end foreach.

// We want to do the same with episode numbers... S01E01 and years.
// I think we can assume it will not exceed S39 nor E59!
// ... and years are 4 consecutive numbers where the first is 1 or 2.

// Extract Year (it's important that this is done after "1080p" had been stripped.
if (preg_match('/[1-2]\d\d\d/', $hacked_release_name, $release_year_occurences) == 1) { // One year was found.
	$movie_year = $release_year_occurences[0];
} elseif (preg_match('/[1-2]\d\d\d/', $hacked_release_name, $release_year_occurences) == 0) { // Year not found.
	$movie_year = '-';
} else {
	$movie_year = 'Error'; // More than one year found - no way to distinguish.
}

// Define a new regex. The pipe (|) operator means OR.
$regex = '/\.S[0-3]\dE[0-5]\d|\.[1-2]\d\d\d/i';
// Note: "\d" - Matches any numeric character - same as [0-9]
// and "/i" makes it case insensitive...

// Then do a reqular expression replacement, as before.
$hacked_release_name = preg_replace($regex, '', $hacked_release_name);

// Finally, we convert dots in the movie_name to spaces..
// which are handled by search engines more effectively.
$movie_name = str_replace("."," ",$hacked_release_name);

?>