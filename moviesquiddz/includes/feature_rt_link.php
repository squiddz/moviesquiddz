<?php // Feature: Generate Rotten Tomatoes links.

// Call function release2movie() to extract movie name from release name.
include_once("includes/release2movie.php");
$movie_name = release2movie($release_name, $tags);

echo '<td><a href="http://www.rottentomatoes.com/search/full_search.php?search=' . $movie_name . '"><img src="images/rt.png" /></a></td>';

?>