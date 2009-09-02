
<h2>Notes:</h2>
<ul>
<li>You still need to enter most settings by editing config.php</li>
<li>Bookmark the URL so use the same settings on each visit.</li>
<li>Remember to build your own FileListing.txt, SceneGroups.txt and OtherTags.txt</li>
<li>See the <a href="http://wiki.github.com/squiddz/moviesquiddz">Wiki</a> for more info!</li>
<ul>

<h3>Your Text Files</h3>

<p>FileListing.txt<br /><input type="file" name="datafile" size="40"></p>
<p>OtherTags.txt [optional]<br /><input type="file" name="datafile" size="40"></p>
<p>SceneGroups.txt [optional]<br /><input type="file" name="datafile" size="40"></p>

<h2>Features</h2>
<form action="../index.php" method="post">

<h3>Basic Features</h3>
<p>
<input type="checkbox" checked="checked" DISABLED /> Show release name.<br />
<input type="checkbox" checked="checked" name="2" /> Show movie name.<br />
<input type="checkbox" checked="checked" name="2" /> Show group name.<br />
</p>

<h3>Movie Site Links</h3>
<p>
<input type="checkbox" checked="checked" name="2" /> Show IMDB popup links.<br />
<input type="checkbox" name="2" /> Show IMDB manual search links.<br />
<input type="checkbox" checked="checked" name="2" /> Show Rotten Tomatoes search links.<br />
</p>

<h3>Scene Related Links</h3>
<p>
<input type="checkbox" checked="checked" name="2" /> Show NFO links.<br />
<input type="checkbox" checked="checked" name="2" /> Show ReScene links.<br />
<input type="checkbox" checked="checked" name="2" /> Show ORLYPreDB links.<br />
</p>

<h3>FileSharing/Download Links</h3>
<p>
<input type="checkbox" checked="checked" name="2" /> Show SceneHD availability and links.<br />
<input type="checkbox" checked="checked" name="2" /> Show BinSearch links.<br />
<input type="checkbox" checked="checked" name="2" /> Show GotNZB4U search links.<br />
</p>

<h3>Other [Misc.] Features</h3>
<p>
<input type="checkbox" checked="checked" name="2" /> Show scene/non-scene.<br />
<input type="checkbox" checked="checked" name="2" /> Show SubtitleSource links.<br />
<input type="checkbox" checked="checked" name="2" /> Show "Open Locally" links.
</p>

<h3>SceneHD Settings</h3>
<p>
Choose your SceneHD link type:<br />
<select>
<option value="1">http://scenehd.org</option>
<option value="1">http://www.scenehd.org</option>
<option value="1">https://scenehd.org/ [SSL]</option>
<option value="1">https://www.scenehd.org/ [SSL]</option>
</select><br />
This is because logins are not transferred across</p>

<p><input type="submit" value="Save Preferences" /> or <input type="reset" value="Restore Defaults" /></p>

</form>
