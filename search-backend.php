<?php 
    //include 'auth-test.php';

    // load dbconnect config
    include '../db-connection/dbconfig.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
        die("Connection failed: " .$conn->connect_error);
    } 

    $patientID= 901;

    $sql = "select * from blood_samples where patient_id= ". $patientID;
    $result= $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
        }
        echo (json_encode($myArray, JSON_PRETTY_PRINT));
    }
    $conn -> close();
?>