<?php // Feature: Detect Scene.

// This module compares group_name with a pre-defined list.
// If a positive match is not found, a red cross is displayed, if it is, a green tick.

// If group name is in scene groups array...
if (in_array($group_name, $scene_groups_array)) {
	echo '<td sorttable_customkey="1"><img src="images/scene.png" /></td>'; // it's scene
} else {
	echo '<td sorttable_customkey="2"><img src="images/non-scene.png" /></td>'; // it's non-scene
}

?>