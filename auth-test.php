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

    // Require this web authentication class file
    require_once 'WebAuth.php';

    // Create a new authentication object
    $auth_object = new WebAuth();

    // Both of these commands make it possible
    // to go to http://mypage.uci.edu/auth-test.php?login=1
    // or http://mypage.uci.edu/auth-test.php?logout=1
    // so people can login or logout.


    if ($_GET[login]) { 
        print('before login()');
        $auth_object->login();
        print('after login()');
        $auth_object->checkAuth();
    }

    if ($_GET[logout]) { 
        $auth_object->logout(); 
    }


    // print('checking isLoggedIn()');
    // Next, we can check whether or not you're logged
    // in by checking the $auth->isLoggedIn()  method
    if ($auth_object->isLoggedIn()) {
            print("success");
    }
    else {
        print("you're not logged in, sorry...");
    }

    // Also, you can look at all the values within
    // the auth object by using the code:

    print "<pre>";
    print_r ($auth_object);
    print "</pre>";

?>
