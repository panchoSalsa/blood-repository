<?php 

    function create_vials($box_id, $blood_sample_id, $blood_sample_type, $box_row, $box_column, $conn) {

        // $sql = "INSERT INTO vials (box_id, blood_sample_id, blood_sample_type, box_row, box_column) VALUES (". $box_id . ", " . $blood_sample_id . ", '" . $blood_sample_type  . "', '" . $box_row . "', " . $box_column . "), (";

        $sql = "INSERT INTO vials (box_id, blood_sample_id, blood_sample_type, box_row, box_column) VALUES ";

        $values = "";
        $i = 0;
        for (; $i < 3; $i++) {
            $values .= "(" . $box_id . ", " . $blood_sample_id . ", '" . $blood_sample_type  . "', '" . $box_row . "', " . ($box_column + $i) . "), ";
        }

        $values .= "(" . $box_id . ", " . $blood_sample_id . ", '" . $blood_sample_type  . "', '" . $box_row . "', " . ($box_column + $i) . ");";

        $sql .= $values;
        print_r($sql);

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>
