The Blood Repo project is a LAMP application.

MySQL for the database.
PHP for front and back-end scripts.
Apache is the server being used.
Linux is the OS being used.

This app also uses Angular for the front end.
Read about controllers and services to understand how to asynchronously fetch data and render it.

****************************************************************************************************************

project architecture


folders

authentication
	this folder contains php files for authenticating with UCI Authentication system.
	check-authentication.php is responsible for making sure that the user has authenticated
		and is registered in the `users` MySQL table. 

create
	this folder will hold php scripts to create blood samples, boxes, freezers, racks, etc.
	for now there is only one file, the blood-sample.php.
	blood-sample.php creates a blood sample by taking parsing the POST request from /views/add-blood-sample.php

css

js
	files that enable Angular features  
	app.js - angular app
	controller.js - responsible for changing view when records are returned.
	service.js - responsible for making asynchronous POST requests or redirection

	files that enable to filter blood samples in /views/search-blood-samples.php
	jQuery-QueryBuilder-2.4.1 library; source: http://querybuilder.js.org/
	jQueryBuilderLogic.js
	sql-parser.js

	files for styling
	ui.core.js
	ui.tabs.js

search
	this folder contains php files that query the `blood_repo` MySQL database.

views
	this folder contains the app's php views.
	all views include the header.php 

	3 important views
	add-blood-sample.php a form to add blood samples.
	
	search-blood-samples.php allows the user to filter our blood sample database.
		when done searching, the user can click on a blood sample. The user will be
		redirected to the blood-sample-location.php page.

	blood-sample-location.php  displays the location of sample1 and sample2 of the selected blood sample based
	on blood sample id.



****************************************************************************************************************

other important files


index.php this is the first page a user sees when login into http://iba05.brainaging.uci.edu/
index.php requires on two files 'authentication/index-check-authentication.php' and 
'index-header.php'.

the differences between 'authentication/index-check-authentication.php' and 'authentication/check-authentication.php'

is that they use relative paths, since index.php is on the app's root directory i had to create
a slighlty different header and authentication file.



blood_repoDB.sql contains the schemas of every table in our `blood_repo` database.

/var/db-connection/dbconfig.php contains the credentials for `blood_repo` database.

Blood Repository Documentation.pdf is a file created by Kevin that explains the goal of this project.


****************************************************************************************************************

Debuggin server-side php



use this function to print to the error log 
error_log($variable);

if you ssh to the blood-repo machine 128.195.163.229

you can open the error log by typing
$ error

you should see something like this 

----------------------------------------------------------------------------------------------------------------
[Wed Aug 23 16:24:59.955461 2017] [:error] [pid 53624] [client 128.195.163.154:65379] PHP Notice:  Undefined index: ucinetid_auth in /var/www/authentication/WebAuth.php on line 94
[Wed Aug 23 16:24:59.955488 2017] [:error] [pid 53624] [client 128.195.163.154:65379] PHP Stack trace:
[Wed Aug 23 16:24:59.955521 2017] [:error] [pid 53624] [client 128.195.163.154:65379] PHP   1. {main}() /var/www/views/search-blood-samples.php:0
[Wed Aug 23 16:24:59.955532 2017] [:error] [pid 53624] [client 128.195.163.154:65379] PHP   2. include() /var/www/views/search-blood-samples.php:34
[Wed Aug 23 16:24:59.955540 2017] [:error] [pid 53624] [client 128.195.163.154:65379] PHP   3. WebAuth->WebAuth() /var/www/authentication/check-authentication.php:67
[Wed Aug 23 16:49:48.317690 2017] [:error] [pid 57768] [client 128.195.163.154:60542] PHP Notice:  Undefined index: ucinetid_auth in /var/www/authentication/WebAuth.php on line 94
[Wed Aug 23 16:49:48.317718 2017] [:error] [pid 57768] [client 128.195.163.154:60542] PHP Stack trace:
[Wed Aug 23 16:49:48.317751 2017] [:error] [pid 57768] [client 128.195.163.154:60542] PHP   1. {main}() /var/www/views/search-blood-samples.php:0
[Wed Aug 23 16:49:48.317762 2017] [:error] [pid 57768] [client 128.195.163.154:60542] PHP   2. include() /var/www/views/search-blood-samples.php:34
[Wed Aug 23 16:49:48.317770 2017] [:error] [pid 57768] [client 128.195.163.154:60542] PHP   3. WebAuth->WebAuth() /var/www/authentication/check-authentication.php:64
----------------------------------------------------------------------------------------------------------------

you should a similar ouput.
you can ouput write to the error log by using the error_log($variable); function
this makes it very convinient when trying to debug php code.
