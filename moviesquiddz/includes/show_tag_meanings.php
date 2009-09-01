<?php // Feature: Show tag meanings.

echo "\n<h2>SceneTags</h2>\n<p>Detected scene tags: ";
$tag_stack = array_unique($tag_stack); // Remove duplicates
sort($tag_stack); // and sort in alphabetical order...

$x = 1;
foreach ($tag_stack as $tag) {
	echo '<a href="http://scenelingo.wordpress.com/tag/'.$tag.'">'.$tag.'</a>';
	if ($x < count($tag_stack)) { echo ' '; } // we only add a trailing space if it's not the last one.
	$x++; // increment $x.
}
echo "</p>\n\n";
echo '<div id="alltagspopup">'."\n".'[<a href="#" onclick="return hs.htmlExpand(this,{width:400,headingText:'."'".'All scene tags.'."'".',wrapperClassName:'."'".'titlebar'."'".'})">View full taglist.</a>]'."\n";
echo '<div class="highslide-maincontent">';
echo "\n<p>The following is the list of scene tags which were scanned for and stripped from the movie name:</p>\n<p>";
sort($tags); // Sort into alphabetical order...
$x = 1;
foreach ($tags as $tag) {
	echo '<a href="http://scenelingo.wordpress.com/tag/'.$tag.'">'.$tag.'</a>';
	if ($x < count($tags)) { echo ' '; } // we only add a trailing space if it's not the last one.
	$x++; // increment $x.
}
echo "</p>\n<p>This list is contained in <em>OtherTags.txt</em>.</p>\n</div>\n</div><!-- end alltagspopup -->\n";

?>