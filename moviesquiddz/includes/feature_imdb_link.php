<?php // Feature: Generate IMDB links.

// Call function release2movie() to extract movie name from release name.
include_once("../moviesquiddz/includes/release2movie.php");
$movie_name = release2movie($release_name, $tags);

// Create a popup link to the list of possible results on IMDB, using HighSlide...
echo '<td><a href="../moviesquiddz/imdbphp/imdbsearch.php?name='.$movie_name.'&searchtype=movie" onclick="return hs.htmlExpand(this, { objectType: '."'".'ajax'."'".', width: '."'".'500'."'".', headingText: '."'".'IMDb Information'."'".', wrapperClassName: '."'".'titlebar'."'".' } )"><img src="../moviesquiddz/images/imdb.png" /></a></td>';

// for comparison purposes, or if the imdbphp class isn't working...
// create a direct search link using the same $movie_name (with greyed-out IMDB button).
if ($feature_imdb_search_link == TRUE) {echo '<td><a href="http://www.imdb.com/find?s=tt&q='.$movie_name .'"><img src="../moviesquiddz/images/imdb_grey.png" /></a></td>';};

?>