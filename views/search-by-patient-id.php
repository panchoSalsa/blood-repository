<!DOCTYPE html>
<html ng-app="BloodRepositoryApp">

  <head>
    <meta charset="utf-8" />
    <title>AngularJS Plunker</title>
    <script>document.write('<base href="' + document.location + '" />');</script>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/ui.tabs.css" type="text/css" media="print, projection, screen"/>
    <link rel="stylesheet" href="../css/base.css" type="text/css"/>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>


    <script src="../js/app.js"></script>
    <script src="../js/controller.js"></script>
    <script src="../js/service.js"></script>

  </head>

  <body ng-controller="SearchByPatientID">
        <?php 
            //include '../auth-test.php';
            include 'header.php';
        ?>


        <form align= "center" ng-submit="search_by_id(id)">
            <div class="form-group">
                <label for="id">Patient ID</label>
                <input type="patientID" class="form-control" id="id" name="id" placeholder="901" ng-model="id">
                <small class="form-text text-muted">Enter the patient ID of the sample you want to look up.</small>
            </div>
        </form>


        <ul class="list-group row" ng-repeat="blood_sample in blood_samples" ng-click="func(blood_sample.id)">
            <li class="list-group-item" style="background-color:#8ab1db;"><h5> <b> Blood Sample ID:</b> {{blood_sample.id}} </h5></li>
            <li class="list-group-item col-xs-6"><b>Synd: </b> {{blood_sample.synd}} </li>
            <li class="list-group-item col-xs-6"><b>MCIcat: </b> {{blood_sample.mci_cat}} </li>
            <li class="list-group-item col-xs-6"><b>Dx: </b> {{blood_sample.dx}} </li>
            <li class="list-group-item col-xs-6"><b>Visit Number: </b> {{blood_sample.visit}} </li>
            <li class="list-group-item col-xs-6"><b>Date of Visit: </b> {{blood_sample.visit_date}} </li>
            <li class="list-group-item col-xs-6"><b>Age: </b> {{blood_sample.age}} </li>
            <li class="list-group-item col-xs-6"><b>MMSE: </b> {{blood_sample.mmse}} </li>
            <li class="list-group-item col-xs-6"><b>Drawn on </b> {{blood_sample.draw_date}} <b> at time </b> {{blood_sample.drawtime}} </li>
            <li class="list-group-item col-xs-6"><b>Frozen Date: </b> {{blood_sample.frozen_date}} </li>
            <li class="list-group-item col-xs-6"><b>Frozen Time: </b> {{blood_sample.frozen_time}} </li>
            <li class="list-group-item col-xs-6"><b>Created By: </b> {{blood_sample.created_by}} </li>
            <li class="list-group-item col-xs-6"><b>Created Date: </b> {{blood_sample.created_date}} </li>
            <li class="list-group-item col-xs-6"><b>Modified By: </b> {{blood_sample.modified_by}}</li>
            <li class="list-group-item col-xs-6"><b>Modified Date: </b> {{blood_sample.modified_date}} </li>
            <li class="list-group-item col-xs-12"><b>Comments: </b> {{blood_sample.comments}} </li>
            <li class="list-group-item col-xs-6"><b>Serum Count: </b> {{blood_sample.serum_count}} </li>
            <li class="list-group-item col-xs-6"><b>Plasma Count: </b> {{blood_sample.plasma_count}} </li>
        </ul>


        <script src="../js/header.js" type="text/javascript"></script>

  </body>

</html>



