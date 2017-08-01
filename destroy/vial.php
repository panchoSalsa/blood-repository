<?php 

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');


    //include 'auth-test.php';

    // load dbconnect config
    include '../../db-connection/dbconfig.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
        die("Connection failed: " .$conn->connect_error);
    } 

    // sanitize data to avoid sql injection.
    // retrieve vial_id from request body.
    // $vial_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    $data = json_decode(file_get_contents("php://input"));

    $vial_id = $data->id;

    $sql = "SELECT * from vials where id = " . $vial_id . ";";

    $result = $conn->query($sql);

    if ($conn->affected_rows > 0) {
        $row = $result->fetch_assoc();


        $blood_sample_id = $row["blood_sample_id"];
        $blood_sample_type = $row["blood_sample_type"];

        // updating blood_sample since we are deleting a vial.

        if ($blood_sample_type == "serum") {
            $sql = "UPDATE blood_samples set serum_count = serum_count - 1 where id = " . $blood_sample_id . " and serum_count > 0;";
        } else {
            $sql = "UPDATE blood_samples set plasma_count = plasma_count - 1 where id = " . $blood_sample_id . " and plasma_count > 0;";
        }

        $conn->query($sql);
        if ($conn->affected_rows <= 0) {
            http_response_code(404);
            echo json_encode(
                array("response" => "Vial not found.", "error" => true), JSON_PRETTY_PRINT);
            exit();
        }

        // delete vial from table.
        $sql = "DELETE from vials where id = " . $vial_id . ";";

        $conn->query($sql);
        if ($conn->affected_rows > 0) {
            http_response_code(200);
            echo json_encode(
                array("response" => "Vial deleted.", "error" => false), JSON_PRETTY_PRINT);
        } else {
            http_response_code(404);
            echo json_encode(
                array("response" => "Vial not found.", "error" => true), JSON_PRETTY_PRINT);
        }
    }

    $conn -> close();
?>