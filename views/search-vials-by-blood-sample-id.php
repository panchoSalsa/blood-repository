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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>


    <script src="../js/app.js"></script>
    <script src="../js/controller.js"></script>
    <script src="../js/service.js"></script>

  </head>

  <body ng-controller="SearchByBloodSampleID">
        <?php 
            //include '../auth-test.php';
            include 'header.php';
        ?>


        <form id="form" align= "center" ng-submit="search_vials_by_blood_sample(id)">
            <div class="form-group">
                <label for="id">Blood Sample ID</label>
                <input type="text" class="form-control" id="id" name="id" ng-model="id">
                <small class="form-text text-muted">Enter the Blood Sample ID you want to look up.</small>
            </div>
        </form>


        <div class="container">
            <div class="row">
                <div class="col-md-6">

                        <h1>Serum Samples</h1>
                        <ul class="list-group row" ng-repeat="vial in vials  | filter: { blood_sample_type: 'serum' }">
                            <li class="list-group-item" style= "background-color:#8ab1db;"><h5> <b> Vial ID:</b> {{vial.id}} </h5></li>
                            <li class="list-group-item"><b>Blood Sample ID: </b> {{vial.blood_sample_id}} </li>
                            <li class="list-group-item"><b>Box ID: </b> {{vial.box_id}} </li>
                            <li class="list-group-item"><b>Box Row: </b> {{vial.box_row}} </li>
                            <li class="list-group-item"><b>Box Column: </b> {{vial.box_column}} </li>
                        </ul>
                </div>


                <div class="col-md-6">
                        <h1>Plasma Samples</h1>
                        <ul class="list-group row" ng-repeat="vial in vials | filter: { blood_sample_type: 'plasma' }">
                            <li class="list-group-item" style= "background-color:#8ab1db;"><h5> <b> Vial ID:</b> {{vial.id}} </h5></li>
                            <li class="list-group-item"><b>Blood Sample ID: </b> {{vial.blood_sample_id}} </li>
                            <li class="list-group-item"><b>Box ID: </b> {{vial.box_id}} </li>
                            <li class="list-group-item"><b>Box Row: </b> {{vial.box_row}} </li>
                            <li class="list-group-item"><b>Box Column: </b> {{vial.box_column}} </li>
                        </ul>
                </div>
            </div>
        </div>
        
</body>

</html>