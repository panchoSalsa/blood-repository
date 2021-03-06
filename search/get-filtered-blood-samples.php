<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    // check for authentication
    include '../authentication/check-authentication.php';

    // load dbconnect config 
    // config folder is located at /var/db-connection
    include '../../db-connection/dbconfig.php';

    $data = json_decode(file_get_contents("php://input"));

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
        die("Connection failed: " .$conn->connect_error);
    } 

    $sql = "select * from blood where " . $data->query . ';';

    $result= $conn->query($sql);

    $array = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $array[] = $row;
        }
    }

    echo (json_encode($array, JSON_PRETTY_PRINT));

    $conn -> close();
?>