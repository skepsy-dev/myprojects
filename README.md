# NavBar Template HTML CSS

single page php web app.

user logged in via web.js eth address.

on successful log in, call to showproj.php to show data table of sql entries from logged in "user_address".
if no entries to read "Add a new project. Your home to store your safe links."

table forms:

Add New project button, a pop up form that inserts the "user_address" as the id for the data entry. sql creates a "proj_id". 
Sends the form data to insertcode.php for sql entry.

Edit button, a pop up form that edits a table row/data entry of "proj_id".
Sends the form data to updatecode.php for sql update.

Delete button, a pop up warning for confirmation of delete. 
Calls deletecode.php to delete entry of "proj_id".
