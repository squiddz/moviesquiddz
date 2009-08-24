
	######  #######    #    ######        #     # #######
	#     # #         # #   #     #       ##   ## #
	#     # #        #   #  #     #       # # # # #
	######  #####   #     # #     #       #  #  # #####
	#   #   #       ####### #     #       #     # #
	#    #  #       #     # #     #       #     # #
	#     # ####### #     # ######        #     # ####### 


===========
# CONTACT
===========

+	Please get in touch with any comments, questions or suggestions: squiddz@gmail.com

+	Get the latest version from http://github.com/squiddz/moviesquiddz/tree/remote

=========
# SETUP
=========

+	Installation requires that the files lie in a "moviesquiddz" folder in the root of the site.
	That is, "http://www.example.com/moviesquiddz/index.php" etc.
	This is because relative linking is used.

+	All configuration options are found in 'config.php'. You'll need to set your paramaters and options there first.

+	Next you will need to create your own versions of the following text files:
	'FileListing.txt', 'OtherTags.txt' and 'SceneGroups.txt'.
	The included ones are only a basic selection to work from.
	Note, not all are necessary for all features. See below for details.

+	Creating 'FileListing.txt'
	In Windows, this list can easily be generated using the supplied batch script: 'FileListing.bat'.
	Open that file in a text editor and read the guidlines there.
	If you have a script or tool for this task on other operating systems, please get in touch.
	Required for: All features.

+	Creating 'OtherTags.txt'
	In this file, you need to add any scene tags that do not constitute part of the movie name.
	The list is treated in a case-insensitive manner, so ".LiMiTED" and ".LIMITED" are equal.
	Be wary of adding tags like ".Final" - some releases contain this term. Use ".Final.Cut", to avoid this.
	For utmost efficiency, place most common terms at the top of the list. This will ensure the string is always
	as short as possible, hence using less memory. [... or is this completely untrue?!]
	Required for: "feature_imdb_link", "feature_rt_link".

+	Creating 'SceneGroups.txt'
	This is required only if you enable the "Detect Scene" feature [$feature_detect_scene].
	Depending on whether your collection consists of BluRay Rips, DVDRs, DVDRips etc, you'll need to
	create a list of the groups in that particular scene.
	The supplied list is aimed at High Definition (x264) release groups.
	Some argue that the high-definition scene in particular is not as good as the p2p groups, who don't
	rush encoding like some groups do.
	Required for: "feature_detect_scene".

+	Setting '$release_dirs'
	This string (or array?) sets the location of the release directory, relative to the domain root.
	e.g. for "http://www.example.com/release_dir_1" you set: $release_dirs = '../release_dir_1';
	For multiple release folders, it becomes: $release_dirs = array("../release_dir_1","../release_dir_2");
	You might find it useful to use Apache's mod_proxy function to make it appear that these directories are under your server
	root, even when they aren't. [ If anyone has any better ideas, i'm listening!! ]
	See http://www.apachetutor.org/admin/reverseproxies for a guide.
	Required for: "feature_local_folder_link".

+	Adding your own features.
	You will see from the source code, that it's simple to add new features. If you have any great ideas or creations, the author would love to know about them! Moreover, he's more than happy to help fabricate them!

===================
# TROUBLESHOOTING
===================

+	Enabling "allow_url_include"
	You might need to enable "allow_url_include" in your PHP installation.
	Find the following line in php.ini: allow_url_include = Off
	and replace it with: allow_url_include = On

=========
# TO-DO
=========

+	Use MqSQL instead of a huge php array to store data from 'FileListing.txt' etc.

+	Find a useful and complete NFO site to link the NFO feature to.

+	Give more information in IMDb pop-up for each movie; rating stars and even plot (in a spoiler-hider thingy)!

+	Extract the year from the release name, rather than just deleting it, and perhaps use that as an extra search term when querying IMDb. Perhaps this could lead to more accurate search results.

+	Function to generate FileListing.txt from a local directory of folders. Perhaps use scandir() which lists files and directories inside a specified path.. However, this will only work on local files, so option to use 'FileListing.txt' must remain.

+	Function (or separate script) to extract a list of releases from an html page.

+	Use this to build a link to gotnzb4u direct nzb download link, using Request ID.

+	Perhaps use a better resource for determining whether it's scene or not. Perhaps a proper predb?

+	A tick/cross or position-number showing whether/where the movie is in the Top250 on IMDb. As an extension of this, perhaps a new page to show only the releases in the Top250, with others hidden. [Most likely will exceed the bandwidh limit on IMDb servers..]

+	A general sort feature where you click the logo/text in the top row to sort by the field.

+	Look into "client-side php" - Perhaps that'd be more useful for this sort of application...

+	Perhaps require special configuration of apache to map folder locations to subdomains or something, for use with feature_local_folder_link.

+	Checkbox showing whether user has the sample or not?

+	Make use of the fact that SubtitleSource uses IMDb id numbers in their urls. e.g. in imdb popup?

+	"The following tags were found: PROPER, REPACK... click them to see what they mean!" with link to scenelingo...

+	With the tag meanings feature, it'd be ideal to attain a list of USED tags, rather than displaying them all... and if possible create a tag cloud of most popular tags!

===================
# FURTHER READING
===================

+	These sites may be of interest:
	http://scenelingo.wordpress.com 		| Definitions of Scene Tags.
	http://rescene.info						| Tool for re-building .rar archives and samples from extracted scene releases.
	http://www.doopes.com/					| DupeCheck Project - great for all scene except high-definition.
	http://www.orlydb.com/					| Pre DB like Doopes. These are great for determining if a group is scene or not.

+	As might these IRC channels:
	irc.efnet.net #x264.rescene.info		| Help with ReScene.
	irc.efnet.net #alt.binaries.hdtv.x264	| Great resource for those interested in NZBs (Usenet) and High Definition.

====================
# ACKNOWLEDGEMENTS
====================

+	Some logos by FamFamFam - Silk Icon Set.
	http://www.famfamfam.com/lab/icons/silk/

+	IMDBphp is used for collecting IMDb data.
	http://sourceforge.net/projects/imdbphp/

+	HighSlide is used for the IMDb Popup.
	http://highslide.com/

+	PHPro Tutorials Introduction to PHP Regex
	http://www.phpro.org/tutorials/Introduction-to-PHP-Regex.html

================
# CONTRIBUTORS
================

+	Refer to changelog to see specifically what these people did. List is in alphabetical order.

+	"allban" from EFNet #x264.rescene.info.

+	"dr0pknutz" from EFNet #x264.rescene.info.

=========
# LEGAL
=========

+	Site icons are (probably) property of the respective sites! Sure they'll be okay with us using them though..!

+	I play no role in internet piracy, nor do I have any intention to aid it.
	I am merely interested in "The Scene" and how it works, and only as a fun idea was this project born.

===============
# MISC. NOTES
===============

+	Does anyone know of a complete (+ regularly updated) list of scene groups? Contact Me!

+	How much more efficient would it be to use MySQL instead of a gigantic array?!
	If it's easy, i'll look into it!

======================
# KNOWN SHORTCOMINGS
======================

+ 	Very inefficient, clunky and poorly coded!

+	feature_local_folder_link does not work in IE. Get Firefox or another real browser! Also very buggy. Probably best to just set
	$feature_local_folder_link = FALSE; in 'config.php'!

====================
# ANOMALIES / BUGS
====================

+	The feature_local_folder_link code generates links to the correct location on the computer, but they are unclickable in WinXP Firefox [3.5]
	A fix is to save the page as HTML then open it locally. I think it's a security precaution. Another fix is to copy the URL of the generated link and paste into a new tab/window.

=============
# CHANGELOG
=============

+	Added / Changed / BugFix / Removed

+	[v0.5] (## #### ####)
	Changed	: Show Tag Meanings sorts alphabetically.
	Changed	: Vast improvements to release2movie.php (formerly stripCrap.php)... now using regex.
	Changed	: IMDbPHP now uses cache... created folder /imdbphp/cache. Stored for 1 week (604800s)
	Changed	: IMDbPHP max results reduced to 10.
	Changed	: Now OtherTags.txt should not include year list, nor S01, S02 etc..
			  [These are now handled by regex.]
	BugFix	: Some png files were not displaying in IE properly. Possibly due to corruption.
	Added	: Blueprint for preferences.php - a UI for config.php.
	Changed	: Used \t and \n to tidy generated html.
			  [Note: must be written {echo "\n"}, not {echo '\n'}.]
	Changed	: Moved CSS to external file.
	Added	: OtherTags list is sorted in descending order, to fix problems like "HDDVDRip" coming after "HDDVD", and hence leaving "Rip".

+	[v0.4] (06 August 2009)
	BugFix	: IMDb Links not working.
			  [Massive thanks to dr0pknutz]!
	Changed	: Now OtherTags.txt does not require leading period (.) on each line.
			  [In fact it is now prohibited.]
	Changed	: MovieSquiddz link now points to hosted readme.
	Removed	: "Loading..." text from HighSlide Popup.
	Added	: Blueprint for "show_tag_meanings" feature.

+	[v0.4 Beta 1] (05 August 2009)
	Added	: Support for various torrent and nzb search sites.
	Changed	: URL for BinSearch to account for new 365 day search.
	Changed	: Vastly simplified how the Detect Scene feature works, now using in_array().

+	[v0.3] (20 July 2009)
	Changed	: Vastly improved "feature_detect_scene.php" [Thanks allban].
	Added	: Working feature_sort_list.
	Changed	: Configuration is now done through 'config.php' rather than 'index.php'.
	Added	: Introduced Local Folder Link feature. Currently in very early development! 

+	[v0.3 Beta 2] (16 July 2009)
	Added	: Added option to disable greyed imdb link.
	Changed	: General code simplification, including removing the "alt" and "title" attributes that were missed in v0.3 Beta 1!
	Added	: WinBinder capability, however it does not work since php code is server-side, not client-side.

+	[v0.3 Beta 1] (16 July 2009)
	BugFix	: Some movies whose name contained tags like "Final" were not being cropped properly.
			  e.g. "Omen.III.The.Final.Conflict.1981.720p.BluRay.x264-SiNNERS" becomes "Omen+III+The".
			  [Fixed by replacing ".Final" and ".Cut" in 'OtherTags.txt' with ".Final.Cut".]
	Removed	: The "alt" and "title" attributes of some links, and other unnecessaries, in order  to cut down on file-size.
			  Admittedly, this makes the page even less standards-compatible!

+	[v0.2] (15 July 2009)
	Added	: Debug mode, which displays version info. etc.
	Changed	: All images and files now saved locally, not on dropbox.
	BugFix	: One or more tags were left appended to the movie name in stripCrap().

+	[v0.1] (13 July 2009)
	INITIAL RELEASE

=================
# END OF README
=================