<?php 

    function create_vials($box_id, $blood_sample_id, $blood_sample_type, $box_row, $box_column, $conn) {

        $sql = "INSERT INTO vials (box_id, blood_sample_id, blood_sample_type, box_row, box_column) VALUES ";

        $values = "";

        $values .= "(" . $box_id . ", " . $blood_sample_id . ", '" . $blood_sample_type  . "', '" . $box_row . "', " . $box_column . ");";

        $sql .= $values;

        if ($conn->query($sql) === TRUE) {
            //echo "New records created successfully";
            return;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>
