<?php 
    include 'auth-test.php';

    // load dbconnect config
    include '../db-connection/dbconfig.php';

    // $conn = new mysqli($servername, $username, $password, $dbname);
    // if ($conn -> connect_error) {
    //     die("Connection failed: " .$conn->connect_error);
    // } 

    // $patientID= $_POST['id'];
    print_r($_POST);
    exit;


    $sql = "INSERT INTO content_page (name, layout, page_id) VALUES (?,?,?)";
	if (!$stmt = $db->prepare($sql)) {
	    die($db->error);
	}
	$stmt->bind_param("ssi", $_POST['name'], $_POST['layout'], $_POST['page_id']);
	if (!$stmt->execute()) {
	    die($stmt->error);
	}
	$stmt->close();

    // $sql = "select * from blood_samples where patient_id= ". $patientID;
    // $result= $conn->query($sql);

    // echo "<div style= 'padding-left: 45px'> <h3> Search results for patient ID: ". $patientID."</h3> </div>";

    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {

    //     } 
    // }
    // $conn -> close();
?>