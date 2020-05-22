
LOADING THE DATABASE

In order to run the Group 1 Project you will need to load provided database. This database file is called

csc350project.sql

and can be found within the "database_files" directory. To load the database we suggest you use the
phpMyAdmin tool packaged with xampp. In order to use this tool you must have the Apache and MYSQL portions 
of xampp running in the xampp control panel. Then you will click the "Admin" button associated with MYSQL
 to launch phpMyAdmin in a browser tab. Once you navigate to the phpMyAdmin tab look along the top of the
  page and select the "Import" option. Within this window the first option available should be to "Choose
  File". You can navigate to the aformentioned "database_files/csc350project.sql" here to select the
database. Ensure all of the checkboxes on the page are checked with the format listed as SQL. These 
should all be default values anyways. Click the "Go" button in order to import the database.

If you encounter a 1046 error while importing please note that you must select a database on the left sidebar
 in phpMyAdmin to import to. Though a bit strange you may need to create a database called CSC350Project and
 leave it blank. When you import all of the data will be loaded into this "shell" database.
 
USING THE SITE

After unzipping the rest of the files to your xampp root directory you should be able to navigate to the site.
Make sure that xampp is running both Apache and MYSQL through the xampp control panel. Now you may navigate
to "localhost/login.php" to begin the login process. The login, create user, and change password functions all
run SQL queries and require the use of the previously loaded database. Any errors while trying to take these
actions would indicate that the database may not have been loaded properly or that permissions to the database
are not propery configured.