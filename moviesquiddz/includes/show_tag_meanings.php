<?php // Feature: Show tag meanings.

echo '<p>';
sort($tags); // Sort into alhabetical order...
foreach ($tags as $tag) { echo '<a href="http://scenelingo.wordpress.com/tag/'.$tag.'">'.$tag.'</a> '; }
echo '</p>';

?>