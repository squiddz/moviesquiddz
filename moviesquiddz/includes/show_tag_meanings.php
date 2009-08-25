<?php // Feature: Show tag meanings.

echo "\n\n<p>The following scene tags were found. Click the links to read more information.<br />\n";
sort($tags); // Sort into alphabetical order...
$x = 1;
foreach ($tags as $tag) {
	echo '<a href="http://scenelingo.wordpress.com/tag/'.$tag.'">'.$tag.'</a>';
	if ($x < count($tags)) { echo ' '; } // we only add a trailing space if it's not the last one.
	$x++; // increment $x.
}
echo "</p>\n";

?>