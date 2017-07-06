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


    include 'vial-test.php';


    // Sample 1
    // adding vials to Sample 1 Box
    $sample_1_box_id = filter_input(INPUT_POST, 'sample_1_box_id', FILTER_SANITIZE_NUMBER_INT);
    $sample_1_blood_sample_id = filter_input(INPUT_POST, 'sample_1_blood_sample_id', FILTER_SANITIZE_NUMBER_INT);
    $sample_1_box_row = filter_input(INPUT_POST, 'sample_1_box_row', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $sample_1_box_column = filter_input(INPUT_POST, 'sample_1_box_column', FILTER_SANITIZE_NUMBER_INT);

    create_vials($sample_1_box_id, $sample_1_blood_sample_id,'serum', $sample_1_box_row , $sample_1_box_column, $conn);
    create_vials($sample_1_box_id, $sample_1_blood_sample_id,'plasma', $sample_1_box_row , ($sample_1_box_column + 4), $conn);


    // Sample 2
    // adding vials to Sample 2 Box
    $sample_2_box_id = filter_input(INPUT_POST, 'sample_2_box_id', FILTER_SANITIZE_NUMBER_INT);
    $sample_2_blood_sample_id = filter_input(INPUT_POST, 'sample_2_blood_sample_id', FILTER_SANITIZE_NUMBER_INT);
    $sample_2_box_row = filter_input(INPUT_POST, 'sample_2_box_row', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $sample_2_box_column = filter_input(INPUT_POST, 'sample_2_box_column', FILTER_SANITIZE_NUMBER_INT);

    create_vials($sample_2_box_id, $sample_2_blood_sample_id,'serum', $sample_2_box_row , $sample_2_box_column, $conn);
    create_vials($sample_2_box_id, $sample_2_blood_sample_id,'plasma', $sample_2_box_row , ($sample_2_box_column + 4), $conn);


    // create_vials(3,1,'serum','B',1, $conn);
    // create_vials(3,1,'plasma','B',5, $conn);
    // create_vials(4,1,'serum','B',1, $conn);
    // create_vials(4,1,'plasma','B',5, $conn);

    // create_vials(4,1,'serum','B',1, $conn);
    // create_vials(4,1,'plasma','B',5, $conn);

    $conn -> close();
?>
