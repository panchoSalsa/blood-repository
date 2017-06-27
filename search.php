<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">

        <title>Blood Repository</title>
        
        <link rel="stylesheet" href="css/ui.tabs.css" type="text/css" media="print, projection, screen"/>
        <link rel="stylesheet" href="css/base.css" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/style.css">


		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="js/jquery-1.2.6.js" type="text/javascript"></script>
        <script src="js/ui.core.js" type="text/javascript"></script>
        <script src="js/ui.tabs.js" type="text/javascript"></script>

    </head>

    <body>
        <?php 
            include 'auth-test.php';
            include 'header.php';

            $servername= "localhost";
            $username = "root";
            $password= "503R4iN07$";
            $dbname= "blood_repo";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn -> connect_error) {
                die("Connection failed: " .$conn->connect_error);
            } 

            $patientID= $_GET['id'];

            $sql = "select * from blood where patient_id= ". $patientID;
            $result= $conn->query($sql);

            echo "<div style= 'padding-left: 45px'> <h3> Search results for patient ID: ". $patientID."</h3> </div>";

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <ul class="list-group row">
                        <li style= "background-color:#8ab1db;" class="list-group-item"><h5> <b> ID: <?php echo $row["id"]; ?> </b></h5></li>
                        <li class="list-group-item col-xs-6"><b>Synd: </b> <?php echo $row["synd"]; ?>  </li>
                        <li class="list-group-item col-xs-6"><b>MCIcat: </b> <?php echo $row["MCIcat"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Dx: </b> <?php echo $row["dx"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Visit Number: </b> <?php echo $row["visit"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Date of Visit: </b> <?php echo $row["visitdate"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Age: </b> <?php echo $row["age"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>MMSE: </b> <?php echo $row["mmse"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Drawn on </b> <?php echo $row["drawdate"]."<b> at time </b>".$row["drawtime"] ?></li>
                        <li class="list-group-item col-xs-6"><b>Frozen Date: </b> <?php echo $row["frzndate"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Frozen Time: </b> <?php echo $row["frzntime"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Created By: </b> <?php echo $row["createdby"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Created Date: </b> <?php echo $row["createddate"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Modified By: </b> <?php echo $row["modifiedby"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Modified Date: </b> <?php echo $row["modifieddate"]; ?> </li>
                        <li class="list-group-item col-xs-12"><b>Comments: </b> <?php echo $row["comments"]; ?> </li>
                        <li style= "background-color:#d8e5f3;" class="list-group-item col-xs-12"> <b> SAMPLE 1 </b> </li>
                        <li class="list-group-item col-xs-6"><b>Rack: </b> <?php echo $row["s1frzrk"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Box: </b> <?php echo $row["s1frzbx"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Row: </b> <?php echo $row["s1boxrow"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Col: </b> <?php echo $row["s1boxcol"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Plasma Count: </b> <?php echo $row["s1plct"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Serum Count: </b> <?php echo $row["s1serct"]; ?> </li>
                        <li style= "background-color:#d8e5f3;" class="list-group-item col-xs-12"> <b> SAMPLE 2 </b> </li>
                        <li class="list-group-item col-xs-6"><b>Rack: </b> <?php echo $row["s2frzrk"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Box: </b> <?php echo $row["s2frzbx"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Row: </b> <?php echo $row["s2boxrow"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Col: </b> <?php echo $row["s2boxcol"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Plasma Count: </b> <?php echo $row["s2plct"]; ?> </li>
                        <li class="list-group-item col-xs-6"><b>Serum Count: </b> <?php echo $row["s2serct"]; ?> </li>        
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

    </body>
</html>
