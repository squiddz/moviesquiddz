<?php // show_tag_meanings.php

function printTagCloud($tags) { // http://www.bytemycode.com/snippets/snippet/415/

        // $tags is the array
		
        //arsort($tags);
		
        $max_size = 32; // max font size in pixels
        $min_size = 12; // min font size in pixels
       
        // largest and smallest array values
        $max_qty = max(array_values($tags));
        $min_qty = min(array_values($tags));
       
        // find the range of values
        $spread = $max_qty - $min_qty;
        if ($spread == 0) { // we don't want to divide by zero
                $spread = 1;
        }
       
        // set the font-size increment
        $step = ($max_size - $min_size) / ($spread);
       
        // loop through the tag array
        foreach ($tags as $key => $value) {
                // calculate font-size
                // find the $value in excess of $min_qty
                // multiply by the font-size increment ($size)
                // and add the $min_size set above
                $size = round($min_size + (($value - $min_qty) * $step));
       
                echo '<a href="http://scenelingo.wordpress.com/tag/'.$key.'" style="font-size: ' . $size . 'px" title="' . $value . ' instances of ' . $key . '">' . $key . '</a> ';
        }
}


echo "\n\t";
echo '<h2>SceneTags</h2>';
echo "\n\t";

// Found Tags (normal view).
echo '<div id="foundtagspopup">';
echo "\n\t\t";
echo '[<a href="#" onclick="return hs.htmlExpand(this,{width:400,headingText:'."'".'Found Tags (normal view).'."'".',wrapperClassName:'."'".'titlebar'."'".'})">Found Tags (normal view).</a>]';
echo "\n\t\t";
echo '<div class="highslide-maincontent">';
echo "\n\t\t";
echo '<p>The following is the list of scene tags found in the releases above:</p>';
echo "\n\t\t";
echo '<p>';
sort($tag_stack); // sort in alphabetical order...
$x = 1;
$unique_tag_stack = array_unique($tag_stack);
foreach ($unique_tag_stack as $tag) {
	echo '<a href="http://scenelingo.wordpress.com/tag/'.$tag.'">'.$tag.'</a>';
	if ($x < count($unique_tag_stack)) { echo ' '; } // we only add a trailing space if it's not the last one.
	$x++; // increment $x.
}
echo '</p>';
echo "\n\t\t";
echo '</div>';
echo "\n\t";
echo '</div><!-- end foundtagspopup -->';
echo "\n\t";

// Found Tags (as tag cloud).
echo '<div id="tagcloudpopup">';
echo "\n\t\t";
echo '[<a href="#" onclick="return hs.htmlExpand(this,{width:400,headingText:'."'".'Found Tags (as tag cloud).'."'".',wrapperClassName:'."'".'titlebar'."'".'})">Found Tags (as tag cloud).</a>]';
echo "\n\t\t";
echo '<div class="highslide-maincontent">';
echo "\n\t\t";
echo '<p>The following is the list of scene tags found in the releases above, displayed as a tag cloud:</p>';
echo "\n\t\t";
echo '<p>';

foreach ($tag_stack as $tag) $tagcount[$tag]++;
printTagCloud($tagcount);
echo '</p>';
echo "\n\t\t";
echo '<p>The size of the tag text indicates the number of times it was found.</p>';
echo "\n\t\t";
echo '</div>';
echo "\n\t";
echo '</div><!-- end tagcloudpopup -->';
echo "\n\t";

// All Tags.
echo '<div id="alltagspopup">';
echo "\n\t\t";
echo '[<a href="#" onclick="return hs.htmlExpand(this,{width:400,headingText:'."'".'All scene tags.'."'".',wrapperClassName:'."'".'titlebar'."'".'})">View full taglist.</a>]';
echo "\n\t\t";
echo '<div class="highslide-maincontent">';
echo "\n\t\t";
echo '<p>This is the full list of tags which were searched for and removed.</p>';
echo "\n\t\t";
echo '<p>';


sort($tags); // Sort into alphabetical order...
$x = 1;
foreach ($tags as $tag) {
	echo '<a href="http://scenelingo.wordpress.com/tag/'.$tag.'">'.$tag.'</a>';
	if ($x < count($tags)) { echo ' '; } // we only add a trailing space if it's not the last one.
	$x++; // increment $x.
}
echo '</p>';
echo "\n\t\t";
echo '<p>This full list is contained in <em>OtherTags.txt</em>.</p>';
echo "\n\t\t";
echo '</div>';
echo "\n\t";
echo '</div><!-- end alltagspopup -->';
echo "\n";

?>