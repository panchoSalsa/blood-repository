<?php 
    include 'auth-test.php';

    // load dbconnect config
    include '../db-connection/dbconfig.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
        die("Connection failed: " .$conn->connect_error);
    } 

    // $patientID= $_POST['id'];
    print_r($_POST);
    // exit;


    $sql = "INSERT INTO blood_samples (study, patient_id, synd, visit_date, age, sex,
     mmse, draw_date, draw_time, staff, frozen_date, frozen_time, created_by, created_date,
      modified_by, modified_date, comments, plasma_count, serum_count) 
      VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	if (!$stmt = $conn->prepare($sql)) {
	    die($db->error);
	}
	$stmt->bind_param("i,i,s,i,s,i,s,i,s,s,s,s,s,s,s,s,s,i,i", $_POST['study'], $_POST['patient_id'], $_POST['synd'], 
		$_POST['visit_date'], $_POST['age'], $_POST['sex'], $_POST['mmse'], 
		$_POST['draw_date'], $_POST['draw_time'], $_POST['staff'], $_POST['frozen_date'], 
		$_POST['frozen_time'], $_POST['created_by'], $_POST['created_date'], $_POST['modified_by'], 
		$_POST['modified_date'], $_POST['comments'], 2, 2);

 //    $sql = "INSERT INTO test (study) VALUES (?)";
	// if (!$stmt = $conn->prepare($sql)) {
	//     die($db->error);
	// }
	// $stmt->bind_param("s", $_POST['study']);

	var_dump($stmt);
	if (!$stmt->execute()) {
	    die($stmt->error);
	} else {
		print_r('success');
	}
	$stmt->close();

    // $sql = "select * from blood_samples where patient_id= ". $patientID;
    // $result= $conn->query($sql);

    // echo "<div style= 'padding-left: 45px'> <h3> Search results for patient ID: ". $patientID."</h3> </div>";

    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {

    //     } 
    // }
    $conn -> close();
?>
