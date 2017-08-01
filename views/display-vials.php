<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">

        <title>Blood Repository</title>
        
        <link rel="stylesheet" href="../css/ui.tabs.css" type="text/css" media="print, projection, screen"/>
        <link rel="stylesheet" href="../css/base.css" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
        <link rel="stylesheet" type="text/css" href="../css/style.css">


		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="../js/jquery-1.2.6.js" type="text/javascript"></script>
        <script src="../js/ui.core.js" type="text/javascript"></script>
        <script src="../js/ui.tabs.js" type="text/javascript"></script>

        <script src = "../js/header.js" type="text/javascript"></script>

    </head>

    <body>
        <?php 
            //include 'auth-test.php';
            include 'header.php';

            // load dbconnect config
            include '../../db-connection/dbconfig.php';

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn -> connect_error) {
                die("Connection failed: " .$conn->connect_error);
            } 

            $blood_sample_id = filter_input(INPUT_GET, 'blood_sample_id', FILTER_SANITIZE_NUMBER_INT);

            $sql = "select * from vials where blood_sample_id = ". $blood_sample_id . ";";
            $result= $conn->query($sql);

            echo "<div style= 'padding-left: 45px'> <h3> Search results for Blood Sample Vials: ". $blood_sample_id ."</h3> </div>";

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <ul class="list-group row">
                        <li style= "background-color:#8ab1db;" class="list-group-item"><h5> <b> Vial ID: <?php echo $row["id"]; ?> </b></h5></li>
                        <li class="list-group-item col-xs-6"><b>Blood Sample ID: </b> <?php echo $row["blood_sample_id"]; ?>  </li>
                        <li class="list-group-item col-xs-6"><b>Box ID: </b> <?php echo $row["box_id"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Box Row: </b> <?php echo $row["box_row"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Box Column: </b> <?php echo $row["box_column"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Blood Sample Type: </b> <?php echo $row["blood_sample_type"]; ?> </li>
                    </ul>
                    <hr />
                    <?php
                }
            }
            $conn -> close();
        ?>

        <script type="text/javascript">
            $(function() {
                $('#container-1 > ul').tabs({ fx: { opacity: 'toggle'} });
            });
        </script>

        <script src="../js/header.js" type="text/javascript"></script>

    </body>
</html>
