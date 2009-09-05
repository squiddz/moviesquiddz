<?php
ini_set( "allow_url_fopen", "1" );

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
	
	// Display Release Name
	echo "<tr><td>".$release_name."</td>";
	
	// Display Movie Name
	if ($show_movie_name) {echo"<td>".$movie_name."</td>";};
	
	// Display Group Name
	if ($show_group_name) {echo"<td>".$group_name."</td>";};
	
	// Detect Scene
	if ($feature_detect_scene) {include("includes/feature_detect_scene.php");}
	
	// Generate IMDB links
	if ($feature_imdb_link) {echo'<td><a href="imdbphp/imdbsearch.php?name='.$movie_name.'&searchtype=movie" onclick="return hs.htmlExpand(this, { objectType: '."'".'ajax'."'".', width: '."'".'500'."'".', headingText: '."'".'IMDb Information'."'".', wrapperClassName: '."'".'titlebar'."'".' } )"><img src="images/imdb.png" /></a></td>';}
	
	// 	Generate IMDB manual search links
	if ($feature_imdb_search_link) {echo '<td><a href="http://www.imdb.com/find?s=tt&q='.$movie_name.'"><img src="images/imdb_grey.png" /></a></td>';}
	
	// 	Generate Rotten Tomatoes links
	if ($feature_rt_link) {echo '<td><a href="http://www.rottentomatoes.com/search/full_search.php?search='.$movie_name.'"><img src="images/rt.png" /></a></td>';}
	
	// 	Generate NFO Link
	if ($feature_nfo_link) {echo '<td><a href="#?release='.$release_name.'"><img src="images/info.png" /></a></td>';}
	
	// 	Generate ReScene Link
	if ($feature_rescene_link) {echo '<td><a href="http://x264.rescene.info/details.aspx?Section=movies&Release='.$release_name.'"><img src="images/rescene.png" /></a></td>';}
	
	// 	Generate ORLY PreDB Link
	if ($feature_orly_link) {echo '<td><a href="http://www.orlydb.com/?q='.$release_name.'"><img src="images/orly.png" /></a></td>';}
	
	// 	Generate SceneHD Link
	if ($feature_scenehd_link) {echo '<td><a href="https://scenehd.org/#search='.$release_name.'"><img src="images/scenehd.png" /></a></td>';}
	
	// 	SceneHD ReSeed
	if ($feature_scenehd_reseed) {include("includes/feature_scenehd_reseed.php");}
	
	// 	Generate BinSearch Link
	if ($feature_binsearch_link) {echo '<td><a href="http://www.binsearch.info/?q='.$release_name.'&max=250&adv_age=365="><img src="images/binsearch.png" /></a></td>';}
	
	// 	Generate GotNZB4U x264 Search Link
	if ($feature_gotnzb4u_x264_link) {include("includes/feature_gotnzb4u_x264_link.php");}
	
	// 	Generate SubtitleSource Search Link
	if ($feature_subsource_link) {echo '<td><a href="http://www.subtitlesource.org/search/'.$release_name.'"><img src="images/subtitlesource.png" /></a></td>';}
	
	// 	Local Folder Link
	if ($feature_local_folder_link) {echo '<td><a href="' . $release_dirs . "/" . $release_name . '"><img src="images/open_folder.png" /></a></td>';}
	
	// Close the row
	echo '</tr>'."\n";
	
// End the foreach loop.
}

// Now we're outside the loop, close the table.
echo '</table>';

// Footer
require("includes/footer.php");

?>