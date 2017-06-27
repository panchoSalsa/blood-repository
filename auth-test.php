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
		$validIDs = array("frfranco");
		if (in_array($id, $validIDs)) {
			return true;
		} else {
			return false;
		}
	}

    // Require this web authentication class file
    require_once 'WebAuth.php';

    // Create a new authentication object
    $auth_object = new WebAuth();

    // Next, we can check whether or not you're logged
    // in by checking the $auth->isLoggedIn()  method
    if (!$auth_object->isLoggedIn()) {
        Header('Location: ' . $auth_object->login_url);
    } else if (! checkID($auth_object->ucinetid)) {
    	checkID($auth_object->ucinetid);
    	http_response_code(404);
		include('access-denied.php');
		die();
    }
?>
