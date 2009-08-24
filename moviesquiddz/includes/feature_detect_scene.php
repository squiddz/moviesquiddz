<?php

// ##################################################
// Detect Scene                                 START
// ##################################################

// This module strips off the last word (after the "-") and compares it with a pre-defined list.
// If a positive match is not found, a red cross is displayed, if it is, a green tick.

// Array_pop returns the last value of an array.
// Explode returns an array of strings, each formed by splitting $release_name on boundaries formed by "-". 
$group_name = array_pop(explode('-',$release_name));

// Set $is_scene variable to FALSE to reset it.
$is_scene = FALSE;

// If group name is in scene groups array...
if (in_array($group_name, $scene_groups_array)) {
	$is_scene = TRUE; // Set $is_scene to true.
}

/*
// Now, for each of the scene group names in the predefined list (test_groups)...
foreach ($scene_groups_array as $test_group) {
		
	// See if it is the same as the calculated release group name
	if ($test_group == $group_name) {
			
		// ... and if it is, set $is_scene to TRUE.
		$is_scene = TRUE;
	}		
}
*/

// If it's still FALSE after all these tests, then it's not scene..!
if ($is_scene == FALSE) {
	echo '<td><img src="images/non-scene.png" /></td>';
} else {
	echo '<td><img src="images/scene.png" /></td>';
}

// ##################################################
// Detect Scene                                   END
// ##################################################

?>