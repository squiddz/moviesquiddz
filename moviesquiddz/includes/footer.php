<?php

//	##################################################
// 	Show tag meanings
if ($show_tag_meanings == TRUE) {
include("includes/show_tag_meanings.php");
}// ##################################################

echo '<div id="footer"><p>Created by <strong><a href="http://olliebennett.co.uk/moviesquiddz/README.txt">MovieSquiddz</a></strong>';
if ($msDebug == TRUE) { echo  ' v <strong>'.$msVersion.'</strong>';};
echo '</p></div></body></html>';

?>