The Blood Repo project is a LAMP application.

MySQL for the database.
PHP for front and back-end scripts.
Apache is the server being used.
Linux is the OS being used.

This app also uses Angular for the front end.
Read about controllers and services to understand how to asynchronously fetch data and render it.

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

blood_repoDB.sql contains the schemas of every table in our `blood_repo` database.

/var/db-connection/dbconfig.php contains the credentials for `blood_repo` database.

Blood Repository Documentation.pdf is a file created by Kevin that explains the goal of this project.