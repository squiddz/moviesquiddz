<?php // feature_detect_scene.php

// This module compares group_name with a pre-defined list.
// If a positive match is found, a green tick is displayed. If not, a red cross.

if (in_array($group_name, $scene_groups_array)) {
	echo '<td sorttable_customkey="1"><img src="images/scene.png" alt="Scene" /></td>';
} else {
	echo '<td sorttable_customkey="2"><img src="images/non-scene.png" alt="Non-Scene" /></td>';
}

?>