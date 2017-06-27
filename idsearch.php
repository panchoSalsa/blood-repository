<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">

        <title>TurnKey LAMP</title>
        
        <link rel="stylesheet" href="css/ui.tabs.css" type="text/css" media="print, projection, screen"/>
        <link rel="stylesheet" href="css/base.css" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>


		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script src="js/ui.core.js" type="text/javascript"></script>
        <script src="js/ui.tabs.js" type="text/javascript"></script>
        <script type="text/javascript">


        </script>

        <?php include 'header.php';?>


        <style>

            .form-group {
                display: inline-block;
                text-align: center;
            }

        </style>



    </head>

    <body>

    <form align= "center" >
        <div class="form-group">
            <label for="exampleInputEmail1">Patient ID</label>
            <input type="patientID" class="form-control" id="patientID_form" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Enter the patient ID of the sample you want to look up.</small>

        </div>
        <div>
            <button onclick="return search_by_id()" type="submit" class="btn btn-primary">Submit</button>

            <script type="text/javascript">
                function search_by_id() {
                    var patient_id= document.getElementById('patientID_form').value;
                    window.location= "search.php?id=" + patient_id;
                    return false;
                }
            </script>

        </div>
    
    </form>

    </body>


</html>
