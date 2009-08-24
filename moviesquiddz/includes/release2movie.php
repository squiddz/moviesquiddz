<?php

// Define function: "release2movie".
// ...to snip the Release name to the length of the movie title - removing all the details, (resolution, group.name etc.)

function release2movie($release_name, $tags)
{

// First cut the release group off the end...
$splitRelease = explode('-',$release_name);
$release_name = $splitRelease[0];

foreach ($tags as $tag) {
	$release_name = preg_replace("/.{$tag}/i", '', $release_name);
}	// where /i makes it case insensitive...

// We also want to return the movie name with spaces, as IMDb and (especially) RottenTomatoes handles dotted search terms badly.
$movie_name = str_replace(".","+",$release_name);


return $movie_name;

}
?>