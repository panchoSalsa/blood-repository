<?php 

    function create_vials($box_id, $blood_sample_id, $blood_sample_type, $box_row, $box_column, $conn) {

        $box_row = strtoupper($box_row);

        $sql = "INSERT INTO vials (box_id, blood_sample_id, blood_sample_type, box_row, box_column) VALUES ";

        $values = "";
        $i = 0;
        for (; $i < 3; $i++) {
            $values .= "(" . $box_id . ", " . $blood_sample_id . ", '" . $blood_sample_type  . "', '" . $box_row . "', " . ($box_column + $i) . "), ";
        }

        $values .= "(" . $box_id . ", " . $blood_sample_id . ", '" . $blood_sample_type  . "', '" . $box_row . "', " . ($box_column + $i) . ");";

        $sql .= $values;

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>