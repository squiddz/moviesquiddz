<?php // index.php

// Due to a bug in old PHP versions, [http://bugs.php.net/bug.php?id=44034]...
function fix_array($array_name) {
foreach ($array_name as &$entry_name) {
	$entry_name = rtrim($entry_name);
}
unset($entry_name);
return ($array_name);
}

// Configuration Settings
require("config.php");

// Header
require("includes/header.php");

// Preparation of arrays etc.
require("includes/preparation.php");

// TAKE EACH RELEASE IN TURN >>>
foreach ($all_releases as $release_name) {
	
	// Calculate common variables (moviename, groupname etc).
	require("includes/release2movie.php");
	
	// Begin New Row
	echo "<tr>";
	
	// Display Release Name
	if ($show_release_name) {echo"<td>".$release_name."</td>";};
	
	// Display Movie Name
	if ($show_movie_name) {
	echo"<td>".$movie_name;
	if (!$show_release_name) {echo ' <img src="images/comment.png" alt=">" title="'.$release_name.'" />';}
	echo"</td>";
	};
	
	// Display Movie Year
	if ($show_movie_year) {echo"<td>".$movie_year."</td>";};
	
	// Display Group Name
	if ($show_group_name) {echo"<td>".$group_name."</td>";};
	
	// Detect Scene
	if ($show_detect_scene) {include("includes/feature_detect_scene.php");}
	
	// Generate IMDB links
	if ($show_imdb_link) {echo'<td><a href="imdbphp/imdbsearch.php?name='.$movie_name.'&amp;searchtype=movie" onclick="return hs.htmlExpand(this, { objectType: '."'".'ajax'."'".', width: '."'".'500'."'".', headingText: '."'".'IMDb Information'."'".', wrapperClassName: '."'".'titlebar'."'".' } )"><img src="images/imdb.png" alt="IMDB" /></a></td>';}
	
	// 	Generate IMDB manual search links
	if ($show_imdb_search_link) {echo '<td><a href="http://www.imdb.com/find?s=tt&amp;q='.$movie_name.'"><img src="images/imdb_grey.png" alt="IMDB" /></a></td>';}
	
	// 	Generate Rotten Tomatoes links
	if ($show_rt_link) {echo '<td><a href="http://www.rottentomatoes.com/search/full_search.php?search='.$movie_name.'"><img src="images/rt.png" alt="RT" /></a></td>';}
	
	// 	Generate NFO Link
	if ($show_nfo_link) {echo '<td><a href="#?release='.$release_name.'"><img src="images/info.png" alt="info" /></a></td>';}
	
	// 	Generate ReScene Link
	if ($show_rescene_link) {echo '<td><a href="http://x264.rescene.info/details.aspx?Section=movies&amp;Release='.$release_name.'"><img src="images/rescene.png" alt="rescene" /></a></td>';}
	
	// 	Generate ORLY PreDB Link
	if ($show_orly_link) {echo '<td><a href="http://www.orlydb.com/?q='.$release_name.'"><img src="images/orly.png" alt="ORLY" /></a></td>';}
	
	// 	Generate SceneHD Link
	if ($show_scenehd_link) {echo '<td><a href="'.$scenehd_url.'#search='.$release_name.'"><img src="images/scenehd.png" alt="SceneHD" /></a></td>';}
	
	// 	SceneHD ReSeed
	if ($show_scenehd_reseed) {include("includes/feature_scenehd_reseed.php");}
	
	// 	Generate BinSearch Link
	if ($show_binsearch_link) {echo '<td><a href="http://www.binsearch.info/?q='.$release_name.'&amp;max=250&amp;adv_age=365="><img src="images/binsearch.png" alt="BinSearch" /></a></td>';}
	
	// 	Generate GotNZB4U x264 Search Link
	if ($show_gotnzb4u_x264_link) {include("includes/feature_gotnzb4u_x264_link.php");}
	
	// 	Generate SubtitleSource Search Link
	if ($show_subsource_link) {echo '<td><a href="http://www.subtitlesource.org/search/'.$release_name.'"><img src="images/subtitlesource.png" alt="SubSource" /></a></td>';}
	
	// 	Local Folder Link
	if ($show_local_folder_link) {echo '<td><a href="' . $release_dirs . "/" . $release_name . '"><img src="images/open_folder.png" alt="OpenFolder" /></a></td>';}
	
	// Close the row
	echo '</tr>'."\n";
	
// End the foreach loop.
}

// Now we're outside the loop, close the table.
echo '</table>';

// Footer
require("includes/footer.php");

?>