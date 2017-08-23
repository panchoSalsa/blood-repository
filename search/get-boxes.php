<?php

    // check for authentication
    include '../authentication/check-authentication.php';

    // load dbconnect config 
    // config folder is located at /var/db-connection
    include '../../db-connection/dbconfig.php';


    $rid = filter_input(INPUT_POST, 'rid', FILTER_SANITIZE_NUMBER_INT);

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
        die("Connection failed: " .$conn->connect_error);
    } 

    $sql = "select id, title from boxes where rid = ". $rid;
    $result= $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
        }
        echo (json_encode($myArray, JSON_PRETTY_PRINT));
    }
    $conn -> close();
  
?>