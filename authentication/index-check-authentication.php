<?php
/***
* UC Irvine - Web Authentication
* For more info see: 
*   http://www.oit.uci.edu/idm/webauth/
*
* How do I use this?
* Start by creating a new file, call it "auth-test.php" for
* example and add the following:
*/
?>
<?php


	function checkID($id) {

		// load dbconnect config
		include '../db-connection/dbconfig.php';

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn -> connect_error) {
            die("Connection failed: " .$conn->connect_error);
        }

        $sql = "select * from users where uci_net_id= '". $id . "' limit 1";
        $result= $conn->query($sql);

        // check for an empty result
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);

			// check if active bit is on
			if ($row['active'] == 1) {
				// user is authenticated and active in users table
				return true;
			}
		} else {
			// user is not authenticated in users table
			return false; 
		}
	}



    // First we check if the user has a valid username and password
    // by authenticating with UCI Single-On Service.


    // To restrict access to certain users we check if the 
    // user's uci_net_id exists in the MySQL users table && if 
    // their active bit is on.

    // If it is we allow access to our site

    // Adminstrators can modify the MySQL users table to grant 
    // access to UCI staff and students.



    // Require this web authentication class file
    require_once 'WebAuth.php';

    // Create a new authentication object
    $auth_object = new WebAuth();

    // Next, we can check whether or not you're logged
    // in by checking the $auth->isLoggedIn()  method
    if (!$auth_object->isLoggedIn()) {
        Header('Location: ' . $auth_object->login_url);
    } else if (! checkID($auth_object->ucinetid)) {
    	http_response_code(404);
		include('access-denied.php');
		die();
    }
?>