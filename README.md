shoutbox
========

This is a simple PHP message box written in CodeIgniter. It allows you to create an account, log in and post messages which appear in the window without a page refresh, allowing you to hold a conversation with multiple users. It uses the JQuery AJAX functions to poll the database at regular intervals, so its not a wise solution for deployment. However, it serves as a basic example of a messaging system, and other features such as long-polling wouldn't be too difficult to implement.

To try it out just clone or download the repo and place it in your web server's htdocs (or equivalent) folder. Then open phpMyAdmin and import the shoutbox.sql file to create the database required for the shoutbox to work. Then go to localhost/shoutbox, and try it out. Your localhost address may be different depending on the platform.

If you are getting database errors, you probably need to open up application -> config -> database.php and enter your phpMyAdmin username and password.
