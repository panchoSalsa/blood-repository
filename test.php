<?php 
    //include 'auth-test.php';

    // load dbconnect config
    include '../db-connection/dbconfig.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
        die("Connection failed: " .$conn->connect_error);
    } 

    // $patientID= $_POST['id'];
    print_r($_POST);

    // sanitize data to avoid sql injection.

    $study = filter_input(INPUT_POST, 'study', FILTER_SANITIZE_NUMBER_INT);
    $patient_id = filter_input(INPUT_POST, 'patient_id', FILTER_SANITIZE_NUMBER_INT);
    $sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

    // $study = $_POST['study'];
    // $patient_id = $_POST['patient_id'];
    // $sex = $_POST['sex'];
    // $name = $_POST['name'];

    //echo $study . " " . $patient_id . " " . $sex . " " . $name;


    $sql = "INSERT INTO test (study, patient_id, sex, name) VALUES (". $study . ", " . $patient_id . ", '" . $sex  . "', '" . $name . "')";
    //print_r($sql);

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn -> close();
?>
