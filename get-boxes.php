<?php 
    //include 'auth-test.php';

    // load dbconnect config
    include '../db-connection/dbconfig.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
        die("Connection failed: " .$conn->connect_error);
    } 

    $sql = "select id from boxes;";
    $result= $conn->query($sql);

    $output_array = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            //$output_array[] = array( 'id' => $row["id"], 'title' => $row["title"]);
            array_push($output_array,$row["id"]);
        }
    }

    $conn -> close();

    echo json_encode( $output_array );
?>