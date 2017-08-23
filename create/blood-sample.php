<?php

    // check for authentication
    include '../authentication/check-authentication.php';

    // load dbconnect config
    // config folder is located at /var/db-connection
    include '../../db-connection/dbconfig.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
        die("Connection failed: " .$conn->connect_error);
    } 

    // MySQL insert from POST
    // source=http://forum.elxis.org/index.php?topic=7618.msg49175#msg49175


    // adding Blood Sample 

    // sanitize data to avoid sql injection.

    $patient_id = filter_input(INPUT_POST, 'patient_id', FILTER_SANITIZE_NUMBER_INT);
    $visit = filter_input(INPUT_POST, 'visit', FILTER_SANITIZE_NUMBER_INT);
    $visit_date = filter_input(INPUT_POST, 'visit_date', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $frozen_time = filter_input(INPUT_POST, 'frozen_time', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $frozen_date = filter_input(INPUT_POST, 'frozen_date', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);


    $sample1_plasma_count = filter_input(INPUT_POST, 'sample1_plasma_count', FILTER_SANITIZE_NUMBER_INT);
    $sample2_plasma_count = filter_input(INPUT_POST, 'sample2_plasma_count', FILTER_SANITIZE_NUMBER_INT);
    $sample1_serum_count = filter_input(INPUT_POST, 'sample1_serum_count', FILTER_SANITIZE_NUMBER_INT);
    $sample2_serum_count = filter_input(INPUT_POST, 'sample2_serum_count', FILTER_SANITIZE_NUMBER_INT);


    // using the following format "Y/m/d" because MySQL stores dates as 0000-00-00
    $visit_date = date("Y/m/d",strtotime($visit_date));


    $frozen_time = date('H:i:s A', strtotime($frozen_time));
    $frozen_date = date("Y/m/d",strtotime($frozen_date));


    $sample1_freezer = filter_input(INPUT_POST, 'sample1_freezer', FILTER_SANITIZE_NUMBER_INT);
    $sample1_freezer_rack = filter_input(INPUT_POST, 'sample1_freezer_rack', FILTER_SANITIZE_NUMBER_INT);
    
    $sample1_freezer_box = filter_input(INPUT_POST, 'sample1_freezer_box', FILTER_SANITIZE_NUMBER_INT);
    $sample1_box_row = filter_input(INPUT_POST, 'sample1_box_row', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $sample1_box_column = filter_input(INPUT_POST, 'sample1_box_column', FILTER_SANITIZE_NUMBER_INT);

    $sample2_freezer = filter_input(INPUT_POST, 'sample2_freezer', FILTER_SANITIZE_NUMBER_INT);
    $sample2_freezer_rack = filter_input(INPUT_POST, 'sample2_freezer_rack', FILTER_SANITIZE_NUMBER_INT);
    
    $sample2_freezer_box = filter_input(INPUT_POST, 'sample2_freezer_box', FILTER_SANITIZE_NUMBER_INT);
    $sample2_box_row = filter_input(INPUT_POST, 'sample2_box_row', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $sample2_box_column = filter_input(INPUT_POST, 'sample2_box_column', FILTER_SANITIZE_NUMBER_INT);

    $created_by = $auth_object->ucinetid;
    $created_date = date("Y/m/d");


    $sql = "INSERT INTO blood (patient_id, visit, visit_date, frozen_time, frozen_date, sample1_freezer, sample1_freezer_rack, sample1_freezer_box, sample1_box_row, sample1_box_column, sample2_freezer, sample2_freezer_rack, sample2_freezer_box, sample2_box_row, sample2_box_column, sample1_plasma_count, sample2_plasma_count, sample1_serum_count, sample2_serum_count, created_by, created_date)
    VALUES (". $patient_id . ", " . $visit  . ", '" . $visit_date . "', '"  . $frozen_time . "', '" 
        . $frozen_date . "', " . $sample1_freezer . ", " . $sample1_freezer_rack . ", " . $sample1_freezer_box .
        ", '" . $sample1_box_row . "', " . $sample1_box_column . ", " . $sample2_freezer . ", " . $sample2_freezer_rack . ", " .
        $sample2_freezer_box . ", '" . $sample2_box_row . "', " . $sample2_box_column . ", " . $sample1_plasma_count. ", " .
        $sample2_plasma_count . ", " . $sample1_serum_count. ", " . $sample2_serum_count . ", '" . $created_by . "', '" . $created_date . "'" . ");";


    error_log($sql);

    $blood_sample_id = null;
    if ($conn->query($sql) === TRUE) {
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

    $conn -> close();

    // return $blood_sample_id so that we can display the vials created.
    echo $blood_sample_id;
?>
