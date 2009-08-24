:: =============================================================
:: Script to Create a File Listing of All Files Within a Folder.
:: (c) 2009 | Squiddz | squiddz@gmail.com
:: =============================================================


:: =============================================================
:: To add this to the explorer context menu:
:: # In explorer, click "Tools", then "Folder Options".
:: # Choose the "File Types" tab, and click "Folder".
:: # Click "Advanced" then "New".
:: # In the "New Action" box that appears, type a name and ...
::   browse for this .bat file.
:: # Note: It makes sense to store this file somewhere ...
::   permanent, like in "C:\Windows\".
:: 
:: Remove the "::" bit to enable any commented-out code. 
:: =============================================================


:: =============================================================
:: First, we disable output of commands as the program runs.
:: #  Note, This is just for aesthetics.

@echo off
:: =============================================================


:: =============================================================
:: Now comes the important line.
:: # The "dir" command by itself simply outputs a list of ...
::   the folders contents.
:: # ">" is the redirection symbol. It causes the output ...
::   to go to a file, rather than simply being displayed.
:: # "/a"
:: # "/b" eliminates all the garbage in the output file.
:: # "/-p"
:: # "/o" determines the order. "n" means names.

:: Other options could be:
:: # "/h" to include hidden files.
:: # "/s" to include the contents of sub-folders.

dir /a /b /-p /on >filelisting.txt
:: =============================================================




:: =============================================================
:: # Open the created file in your default text editor.
filelisting.txt
:: =============================================================




:: =============================================================
:: And finally, delete the file again afterwards, for tidyness!

del filelisting.txt
:: =============================================================




:: =============================================================
:: The following command pauses until any key is pressed.

::pause
:: =============================================================




:: =============================================================
:: # I recommend installing Notepad++, it's available from
::   http://notepad-plus.sourceforge.net/
::   because it's better than the default in so many ways!
::
:: # Credit for this idea goes to TheElderGeek @
::   http://www.theeldergeek.com/file_list_generator.htm
:: =============================================================

