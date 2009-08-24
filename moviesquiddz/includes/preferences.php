<html>
<head>
<title>Preferences</title>
</head>

<body>
<h1>MovieSquiddz Preferences [ NOT WORKING YET ]</h1>
<h2>Notes:</h2>
<ul>
<li>You still need to enter most settings by editing config.php</li>
<li>Bookmark the URL so use the same settings on each visit.</li>
<li>Remember to build your own FileListing.txt, SceneGroups.txt and OtherTags.txt</li>
<li>See the <a href="http://olliebennett.co.uk/moviesquiddz/README.txt">ReadMe</a> for more info!</li>
<ul>

<form action="../index.php" method="post">

<h3><input type="checkbox" checked="checked" name="1"  />Sort releases alphabetically.</h3><span>Disable this to leave releases in the order supplied in the text file.</span>


<select>
	<option value="1">Yes</option>
	<option value="0">No</option>
</select>



<p><input type="submit" value="Save Preferences" /> or <input type="reset" value="Restore Defaults" /></p>

</form>


</body>
</html>