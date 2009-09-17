<?php // preferences.php ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MovieSquiddz &bull; Prefs</title>

<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" href="../favicon.ico">
<!--<script type="text/javascript" src="checkbox.js"></script>-->

<script type="text/javascript">
function selectToggle(toggle, form) {
     var myForm = document.forms[form];
     for( var i=0; i < myForm.length; i++ ) { 
          if(toggle) {
               myForm.elements[i].checked = "checked";
          } 
          else {
               myForm.elements[i].checked = "";
          }
     }
}
</script>

</head>

<body>

<h1><a href="/" alt="Home">HOME</a> &bull; <a href="../">MovieSquiddz</a></h1>

<?php include '../config.php'; ?>

<form name="prefs" action="../index.php" method="post" enctype="multipart/form-data">

<h2>Your Text Files</h2>
<p>If you do not set any of these files, the defaults will be used instead</p>
<p>FileListing.txt [recommended!]<br /><input type="file" name="FileListing" size="40"></p>
<p>OtherTags.txt [advanced]<br /><input type="file" name="OtherTags" size="40"></p>
<p>SceneGroups.txt [advanced]<br /><input type="file" name="SceneGroups" size="40"></p>

<h2>Features</h2>

<h3>Basic Features</h3>
<p>
<label for="show_release_name"><input type="checkbox" <?php if ($show_release_name) { echo 'checked="checked"';} ?> name="show_release_name" id="show_release_name" /> Show Release Name.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_movie_name"><input type="checkbox" <?php if ($show_movie_name) { echo 'checked="checked"';} ?> name="show_movie_name" id="show_movie_name" /> Show Movie Name.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_movie_year"><input type="checkbox" <?php if ($show_movie_year) { echo 'checked="checked"';} ?> name="show_movie_year" id="show_movie_year" /> Show Movie Year.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_group_name"><input type="checkbox" <?php if ($show_group_name) { echo 'checked="checked"';} ?> name="show_group_name" id="show_group_name" /> Show Group Name.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
</p>

<h3>Movie Site Links</h3>
<p>
<label for="show_imdb_link"><input type="checkbox" <?php if ($show_imdb_link) { echo 'checked="checked"';} ?> name="show_imdb_link" id="show_imdb_link" /> Show IMDB popup links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_imdb_search_link"><input type="checkbox" <?php if ($show_imdb_search_link) { echo 'checked="checked"';} ?> name="show_imdb_search_link" id="show_imdb_search_link" /> Show IMDB manual search links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_rt_link"><input type="checkbox" <?php if ($show_rt_link) { echo 'checked="checked"';} ?> name="show_rt_link" id="show_rt_link" /> Show Rotten Tomatoes search links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
</p>

<h3>Scene Related Links</h3>
<p>
<label for="show_nfo_link"><input type="checkbox" <?php if ($show_nfo_link) { echo 'checked="checked"';} ?> name="show_nfo_link" id="show_nfo_link" /> Show NFO links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_rescene_link"><input type="checkbox" <?php if ($show_rescene_link) { echo 'checked="checked"';} ?> name="show_rescene_link" id="show_rescene_link" /> Show ReScene links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_orly_link"><input type="checkbox" <?php if ($show_orly_link) { echo 'checked="checked"';} ?> name="show_orly_link" id="show_orly_link" /> Show ORLYPreDB links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
</p>

<h3>FileSharing/Download Links</h3>
<p>
<label for="show_scenehd_link"><input type="checkbox" <?php if ($show_scenehd_link) { echo 'checked="checked"';} ?> name="show_scenehd_link" id="show_scenehd_link" /> Show simple SceneHD search links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#show_scenehd_reseed"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_scenehd_reseed"><input type="checkbox" <?php if ($show_scenehd_reseed) { echo 'checked="checked"';} ?> name="show_scenehd_reseed" id="show_scenehd_reseed" /> Show SceneHD availability and links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_binsearch_link"><input type="checkbox" <?php if ($show_binsearch_link) { echo 'checked="checked"';} ?> name="show_binsearch_link" id="show_binsearch_link" /> Show BinSearch links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_gotnzb4u_x264_link"><input type="checkbox" <?php if ($show_gotnzb4u_x264_link) { echo 'checked="checked"';} ?> name="show_gotnzb4u_x264_link" id="show_gotnzb4u_x264_link" /> Show GotNZB4U search links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
</p>

<h3>Other [Misc.] Features</h3>
<p>
<label for="sort_list"><input type="checkbox" <?php if ($sort_list) { echo 'checked="checked"';} ?> name="sort_list" id="sort_list" /> Sort FileList.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_detect_scene"><input type="checkbox" <?php if ($show_detect_scene) { echo 'checked="checked"';} ?> name="show_detect_scene" id="show_detect_scene" /> Show scene/non-scene.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_subsource_link"><input type="checkbox" <?php if ($show_subsource_link) { echo 'checked="checked"';} ?> name="show_subsource_link" id="show_subsource_link" /> Show SubtitleSource links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_local_folder_link"><input type="checkbox" <?php if ($show_local_folder_link) { echo 'checked="checked"';} ?> name="show_local_folder_link" id="show_local_folder_link" /> Show "Open Locally" links.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<label for="show_tag_meanings"><input type="checkbox" <?php if ($show_tag_meanings) { echo 'checked="checked"';} ?> name="show_tag_meanings" id="show_tag_meanings" /> Show links to tag meanings at SceneLingo.</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a>
</p>

<p>If allow_url_fopen is disabled on your server, either enable it, or you'll need to upload the requested files manually.</p>

<h3>SceneHD Settings</h3>
<p>
Choose your SceneHD link type: <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
<select name="scenehd_url" size="4">
<option value="http://scenehd.org/">http://scenehd.org/</option>
<option value="http://www.scenehd.org/">http://www.scenehd.org/</option>
<option value="https://scenehd.org/">https://scenehd.org/</option>
<option value="https://www.scenehd.org/">https://www.scenehd.org/</option>
</select>
</p>

<p>
<label for="msDebug"><input type="checkbox" <?php if ($msDebug) { echo 'checked="checked"';} ?> name="msDebug" id="msDebug" /> Debug Mode (advanced).</label> <a href="http://github.com/squiddz/moviesquiddz/wikis/features/#top"><img src="../images/question.png" alt="[?]" title="Click for help." /></a><br />
</p>

<p><input type="submit" value="Save Preferences" /> <input type="button" onclick="selectToggle(true, 'prefs');" value="Select All"> <input type="button" onclick="selectToggle(false, 'prefs');" value="Deselect All"> <input type="reset" value="Restore Defaults" /></p>

</form>