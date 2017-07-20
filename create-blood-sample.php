<?php 
    //include 'auth-test.php';

    // load dbconnect config
    include '../db-connection/dbconfig.php';

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


    $sample_1_plasma_count = filter_input(INPUT_POST, 'sample_1_plasma_count', FILTER_SANITIZE_NUMBER_INT);
    $sample_2_plasma_count = filter_input(INPUT_POST, 'sample_2_plasma_count', FILTER_SANITIZE_NUMBER_INT);
    $sample_1_serum_count = filter_input(INPUT_POST, 'sample_1_serum_count', FILTER_SANITIZE_NUMBER_INT);
    $sample_2_serum_count = filter_input(INPUT_POST, 'sample_2_serum_count', FILTER_SANITIZE_NUMBER_INT);


    $total_plasma = $sample_1_plasma_count + $sample_2_plasma_count;
    $total_serum = $sample_1_serum_count + $sample_2_serum_count;

    // using the following format "Y/m/d" because MySQL stores dates as 0000-00-00
    $visit_date = date("Y/m/d",strtotime($visit_date));

    // ****
    // need to fix how to store time in mysql
    $frozen_time = date('H:i:s A', strtotime($frozen_time));
    // print($frozen_time);
    // exit();
    $frozen_date = date("Y/m/d",strtotime($frozen_date));


    // $sql = "INSERT INTO blood_samples (study, patient_id, synd, mci_cat, dx, visit, visit_date, age, sex, mmse, draw_date, staff, frozen_date, created_by, created_date, modified_by, modified_date, comments, plasma_count, serum_count) 
    // VALUES (". $study . ", " . $patient_id . ", '" . $synd  . "', '" . $mci_cat . "', '" . $dx . "', " . $visit  . ", '" . $visit_date . "', " . $age .
    //     ", '" . $sex . "', " . $mmse  . ", '" . $draw_date . "', '" . $staff . "', '" . $frozen_date . "', '" . $created_by . "', '". $created_date . "', '" . $modified_by . "', '" . $modified_date . "', '". $comments . "', " . 8 . ", " . 8 . ");";


    // $sql = "INSERT INTO blood_samples (patient_id, visit, visit_date, frozen_time, frozen_date, plasma_count, serum_count) 
    // VALUES (". $patient_id . ", " . $visit  . ", '" . $visit_date . "', '"  . $frozen_time . "', '" 
    //     . $frozen_date . "', " . 8 . ", " . 8 . ");";

    $sql = "INSERT INTO blood_samples (patient_id, visit, visit_date, frozen_time, frozen_date, plasma_count, serum_count)
    VALUES (". $patient_id . ", " . $visit  . ", '" . $visit_date . "', '"  . $frozen_time . "', '" 
        . $frozen_date . "', " . $total_plasma . ", " . $total_serum . ");";

//    print_r($sql);

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


    include 'create-vials.php';

    // Sample 1
    // adding vials to Sample 1 Box
    $sample_1_box_id = filter_input(INPUT_POST, 'sample_1_box_id', FILTER_SANITIZE_NUMBER_INT);
    $sample_1_box_row = filter_input(INPUT_POST, 'sample_1_box_row', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $sample_1_box_column = filter_input(INPUT_POST, 'sample_1_box_column', FILTER_SANITIZE_NUMBER_INT);

    create_vials($sample_1_box_id, $blood_sample_id, 'serum', $sample_1_box_row , $sample_1_box_column, $conn);
    create_vials($sample_1_box_id, $blood_sample_id,'plasma', $sample_1_box_row , ($sample_1_box_column + 4), $conn);
    //create_vials($sample_1_box_id, $blood_sample_id,'plasma', $sample_1_box_row , ($sample_1_box_column + $sample_1_plasma_count), $conn);
    // Sample 2
    // adding vials to Sample 2 Box
    $sample_2_box_id = filter_input(INPUT_POST, 'sample_2_box_id', FILTER_SANITIZE_NUMBER_INT);
    $sample_2_box_row = filter_input(INPUT_POST, 'sample_2_box_row', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
    $sample_2_box_column = filter_input(INPUT_POST, 'sample_2_box_column', FILTER_SANITIZE_NUMBER_INT);

    create_vials($sample_2_box_id, $blood_sample_id,'serum', $sample_2_box_row , $sample_2_box_column, $conn);
    create_vials($sample_2_box_id, $blood_sample_id,'plasma', $sample_2_box_row , ($sample_2_box_column + 4), $conn);
    //create_vials($sample_2_box_id, $blood_sample_id,'plasma', $sample_2_box_row , ($sample_2_box_column + $sample_1_serum_count), $conn);

    $conn -> close();

    // return $blood_sample_id so that we can display the vials created.
    echo $blood_sample_id;
?>
