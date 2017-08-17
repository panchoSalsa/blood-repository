<!DOCTYPE html>
<html ng-app="BloodRepositoryApp">

  <head>
    <meta charset="utf-8" />
    <title>Search By Patient ID</title>
    <script>document.write('<base href="' + document.location + '" />');</script>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/ui.tabs.css" type="text/css" media="print, projection, screen"/>
    <link rel="stylesheet" href="../css/base.css" type="text/css"/>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>

    <link rel="stylesheet" href="../js/jQuery-QueryBuilder-2.4.1/dist/css/query-builder.default.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>


    <script src="https://cdn.jsdelivr.net/jquery.query-builder/2.4.1/js/query-builder.standalone.min.js"> </script>
    <script src="../js/sql-parser.js"></script>

    <script src="../js/app.js"></script>
    <script src="../js/controller.js"></script>
    <script src="../js/service.js"></script>

  </head>

  <body ng-controller="SearchByPatientID">
        <?php 
            include '../authentication/check-authentication.php';
            include 'header.php';
        ?>

        <div class="row">
            <div class="col-sm-9" id="builder">
            </div>
            <div class="col-sm-3">
                <div id="record_count" style="text-align:center">
                    <h2>Number of Records Found {{blood_samples.length}}</h2>
                </div>
            </div>
        <!-- <div id="builder"></div> -->
        </div>

        <ul class="list-group row" ng-repeat="blood_sample in blood_samples" ng-click="redirect_to_vials(blood_sample.id)">
            <li class="list-group-item" style="background-color:#8ab1db;"><h5> <b> Blood Sample ID:</b> {{blood_sample.id}} </h5></li>
            <li class="list-group-item col-xs-6"><b>Synd: </b> {{blood_sample.synd}} </li>
            <li class="list-group-item col-xs-6"><b>MCIcat: </b> {{blood_sample.mci_cat}} </li>
            <li class="list-group-item col-xs-6"><b>Dx: </b> {{blood_sample.dx}} </li>
            <li class="list-group-item col-xs-6"><b>Visit Number: </b> {{blood_sample.visit}} </li>
            <li class="list-group-item col-xs-6"><b>Date of Visit: </b> {{blood_sample.visit_date}} </li>
            <li class="list-group-item col-xs-6"><b>Age: </b> {{blood_sample.age}} </li>
            <li class="list-group-item col-xs-6"><b>MMSE: </b> {{blood_sample.mmse}} </li>
            <li class="list-group-item col-xs-6"><b>Drawn on </b> {{blood_sample.draw_date}} <b> at time </b> {{blood_sample.draw_time}} </li>
            <li class="list-group-item col-xs-6"><b>Frozen Date: </b> {{blood_sample.frozen_date}} </li>
            <li class="list-group-item col-xs-6"><b>Frozen Time: </b> {{blood_sample.frozen_time}} </li>
            <li class="list-group-item col-xs-6"><b>Created By: </b> {{blood_sample.created_by}} </li>
            <li class="list-group-item col-xs-6"><b>Created Date: </b> {{blood_sample.created_date}} </li>
            <li class="list-group-item col-xs-6"><b>Modified By: </b> {{blood_sample.modified_by}}</li>
            <li class="list-group-item col-xs-6"><b>Modified Date: </b> {{blood_sample.modified_date}} </li>
            <li class="list-group-item col-xs-12"><b>Comments: </b> {{blood_sample.comments}} </li>
            <li class="list-group-item col-xs-6"><b>Sample1 Serum Count: </b> {{blood_sample.sample1_serum_count}} </li>
            <li class="list-group-item col-xs-6"><b>Sample1 Plasma Count: </b> {{blood_sample.sample1_plasma_count}} </li>
            <li class="list-group-item col-xs-6"><b>Sample2 Serum Count: </b> {{blood_sample.sample2_serum_count}} </li>
            <li class="list-group-item col-xs-6"><b>Sample2 Plasma Count: </b> {{blood_sample.sample2_plasma_count}} </li>
        </ul>


    <script src="../js/jQueryBuilderLogic.js"></script>
  </body>

</html>



