#shoutbox

##About

This is a simple PHP and JavaScript message box built with the CodeIgniter framework. The user creates an account, signs in and posts messages that can be viewed by other users. Only the 5 most recent messages are displayed. The database is polled at regular intervals to retrieve and update the messages, so it is not a wise solution for deployment. Long-polling would solve this by drastically reducing the HTTP requests. However, this project was intended mainly as an exercise in object oriented PHP and handling AJAX calls.

##Installation

If you want to try this out, just clone or download the repository and put it in your `htdocs` folder. Import the `shoutbox.sql` file into PHPMyAdmin to create the database required for the shout box to work. If necessary, edit the settings in `application -> config -> database.php` to match your setup. Launch the shout box in your localhost server.
