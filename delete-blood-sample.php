<?php 
    //include 'auth-test.php';

    // load dbconnect config
    include '../db-connection/dbconfig.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
        die("Connection failed: " .$conn->connect_error);
    } 

    // sanitize data to avoid sql injection.
    // retrieve blood_sample_id from request body.
    $blood_sample_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);


    $sql = "DELETE from blood_samples where id = " . $blood_sample_id . ";";

    $conn->query($sql);
    if ($conn->affected_rows > 0) {
        http_response_code(200);
        echo json_encode(
                array("response" => "Blood sample deleted.", "error" => false), JSON_PRETTY_PRINT);
    } else {
        http_response_code(404);
        echo json_encode(
            array("response" => "Blood sample not found.", "error" => true), JSON_PRETTY_PRINT);
    }

    $conn -> close();
?>
