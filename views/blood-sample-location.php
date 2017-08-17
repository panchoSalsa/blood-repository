<!DOCTYPE html>
<html ng-app="BloodRepositoryApp">

  <head>
    <meta charset="utf-8" />
    <title>Vials</title>
    <script>document.write('<base href="' + document.location + '" />');</script>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/ui.tabs.css" type="text/css" media="print, projection, screen"/>
    <link rel="stylesheet" href="../css/base.css" type="text/css"/>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>


    <script src="../js/app.js"></script>
    <script src="../js/controller.js"></script>
    <script src="../js/service.js"></script>

  </head>

  <body ng-controller="SearchByBloodSampleID">
        <?php 
            include '../authentication/check-authentication.php';
            include 'header.php';
        ?>

        <ul class="list-group row">
            <li class="list-group-item" style="background-color:#8ab1db;"><h5> Sample1 Location</h5></li>
            <li class="list-group-item col-xs-6"><b>Freezer: </b> {{blood_sample.sample1_freezer}} </li>
            <li class="list-group-item col-xs-6"><b>Freezer Rack: </b> {{blood_sample.sample1_freezer_rack}} </li>
            <li class="list-group-item col-xs-4"><b>Freezer Box: </b> {{blood_sample.sample1_freezer_box}} </li>
            <li class="list-group-item col-xs-4"><b>Box Row: </b> {{blood_sample.sample1_box_row}} </li>
            <li class="list-group-item col-xs-4"><b>Box Column:</b> {{blood_sample.sample1_box_column}} </li>
        </ul>


        <ul class="list-group row">
            <li class="list-group-item" style="background-color:#8ab1db;"><h5> Sample2 Location</h5></li>
            <li class="list-group-item col-xs-6"><b>Freezer: </b> {{blood_sample.sample2_freezer}} </li>
            <li class="list-group-item col-xs-6"><b>Freezer Rack: </b> {{blood_sample.sample2_freezer_rack}} </li>
            <li class="list-group-item col-xs-4"><b>Freezer Box: </b> {{blood_sample.sample2_freezer_box}} </li>
            <li class="list-group-item col-xs-4"><b>Box Row: </b> {{blood_sample.sample2_box_row}} </li>
            <li class="list-group-item col-xs-4"><b>Box Column:</b> {{blood_sample.sample2_box_column}} </li>
        </ul>

</body>

</html>