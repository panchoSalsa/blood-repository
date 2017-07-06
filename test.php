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

    // MySQL insert from POST
    // source=http://forum.elxis.org/index.php?topic=7618.msg49175#msg49175


    // adding Blood Sample 

    // sanitize data to avoid sql injection.

    $study = filter_input(INPUT_POST, 'study', FILTER_SANITIZE_NUMBER_INT);
    $patient_id = filter_input(INPUT_POST, 'patient_id', FILTER_SANITIZE_NUMBER_INT);
    $synd = filter_input(INPUT_POST, 'synd', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $mci_cat = filter_input(INPUT_POST, 'mci_cat', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $dx = filter_input(INPUT_POST, 'dx', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $visit = filter_input(INPUT_POST, 'visit', FILTER_SANITIZE_NUMBER_INT);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $mmse = filter_input(INPUT_POST, 'mmse', FILTER_SANITIZE_NUMBER_INT);
    $staff = filter_input(INPUT_POST, 'staff', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $created_by = filter_input(INPUT_POST, 'created_by', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $modified_by = filter_input(INPUT_POST, 'modified_by', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $comments =filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

    $sql = "INSERT INTO blood_samples (study, patient_id, synd, mci_cat, dx, visit, age, sex, mmse, staff, created_by, modified_by, comments, plasma_count, serum_count) 
    VALUES (". $study . ", " . $patient_id . ", '" . $synd  . "', '" . $mci_cat . "', '" . $dx . "', " . $visit  . ", " . $age .
        ", '" . $sex . "', " . $mmse  . ", '" . $staff . "', '" . $created_by . "', '" . $modified_by . "', '" . $comments . "', " . 8 . ", " . 8 . ");";
    print_r($sql);


    $blood_sample_id = null;
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";

        // retrive the id of created blood_sample.
        $blood_sample_id = $conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit;
    }

    // check $blood_sample_id 
    if (is_null($blood_sample_id)) {
        print_r('failed to create blood sample record');
        exit;
    }


    include 'vial-test.php';

    // Sample 1
    // adding vials to Sample 1 Box
    $sample_1_box_id = filter_input(INPUT_POST, 'sample_1_box_id', FILTER_SANITIZE_NUMBER_INT);
    $sample_1_box_row = filter_input(INPUT_POST, 'sample_1_box_row', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $sample_1_box_column = filter_input(INPUT_POST, 'sample_1_box_column', FILTER_SANITIZE_NUMBER_INT);

    create_vials($sample_1_box_id, $blood_sample_id, 'serum', $sample_1_box_row , $sample_1_box_column, $conn);
    create_vials($sample_1_box_id, $blood_sample_id,'plasma', $sample_1_box_row , ($sample_1_box_column + 4), $conn);

    // Sample 2
    // adding vials to Sample 2 Box
    $sample_2_box_id = filter_input(INPUT_POST, 'sample_2_box_id', FILTER_SANITIZE_NUMBER_INT);
    $sample_2_box_row = filter_input(INPUT_POST, 'sample_2_box_row', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $sample_2_box_column = filter_input(INPUT_POST, 'sample_2_box_column', FILTER_SANITIZE_NUMBER_INT);

    create_vials($sample_2_box_id, $blood_sample_id,'serum', $sample_2_box_row , $sample_2_box_column, $conn);
    create_vials($sample_2_box_id, $blood_sample_id,'plasma', $sample_2_box_row , ($sample_2_box_column + 4), $conn);

    $conn -> close();
?>
