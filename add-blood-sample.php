<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">

        <title>Blood Repository</title>
        
        <link rel="stylesheet" href="css/ui.tabs.css" type="text/css" media="print, projection, screen"/>
        <link rel="stylesheet" href="css/base.css" type="text/css"/>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
<!--         <link rel="stylesheet" type="text/css" href="css/style.css"> -->


		<!-- jQuery library -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script> 
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>-->

    <!-- down-graded to jQuery 2.1 so that I can use bootstrap's date picker  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>



<style>
html, body {
    background-color: white;
    margin: 0;
    padding: 0;
}

.container-color-md{
    margin-bottom: 1em;
}
.container-colored-md.bg-2-md {
    background-color: #f3f3f3
}

fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
</style>

    </head>

    <body>
        <?php 
            //include 'auth-test.php';
            include 'header.php';
        ?>

<!-- source=https://bootsnipp.com/snippets/GXG0R -->

    <div class="container-colored-md bg-2-md">
       <div class="container">
          <form action="create-blood-sample.php" method="POST">
             <fieldset class="scheduler-border">
                <legend class="scheduler-border">Blood Sample Form</legend>

                <div class="row">

                  <div class="col-sm-4">
                   <label for="patient_id">Patient ID</label>  
                   <div>
                      <input id="patient_id" class="form-control" name="patient_id" type="text">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <label for="visit">Visit</label> 
                   <div>
                      <input id="visit" class="form-control" name="visit" type="text">
                    </div>
                  </div>

                  <div class="col-sm-4">

                          <label for="visit_date">Visit Date</label>
                          <div class="form-group">
                                <div class="input-group date" id="datetimepicker_visit_date">
                                    <input id="visit_date" class="form-control" name="visit_date" type="text"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                          </div>
                  </div>
                </div>



                <div class="row">
<!-- source=https://eonasdan.github.io/bootstrap-datetimepicker/#custom-icons -->
                  <div class='col-sm-4'>
                      <label for="frozen_time">Frozen Time</label> 
                      <div class="form-group">
                          <div class='input-group date' id='datetimepicker3'>
                              <input type='text' class="form-control" id="frozen_time" name="frozen_time" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-time"></span>
                              </span>
                          </div>
                      </div>
                  </div>

                  <div class="col-sm-4">

                          <label for="frozen_date">Frozen Date</label> 
                          <div class="form-group">
                                <div class="input-group date" id="datetimepicker_frozen_date">
                                    <input id="frozen_date" class="form-control" name="frozen_date" type="text"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                          </div>
                  </div>
                </div>




                <div class="row">
                  <div class="col-sm-6">
                    <legend>Sample 1</legend>
                    <div class="form-group">

                       <label for="sample_1_freezer_id">Freezer ID</label> 
                       <div>
                          <input id="sample_1_freezer_id" class="form-control" name="sample_1_freezer_id" type="text">
                       </div>

                       <label for="sample_1_freezer_rack">Freezer Rack</label> 
                       <div>
                          <input id="sample_1_freezer_rack" class="form-control" name="sample_1_freezer_rack" type="text">
                       </div>

                       <label for="sample_1_box_id">Box ID</label>  
                       <div>
                          <input id="sample_1_box_id" class="form-control" name="sample_1_box_id" type="text">
                       </div>

                       <label for="sample_1_box_row">Box Row</label>  
                       <div>
                          <input id="sample_1_box_row" class="form-control" name="sample_1_box_row" type="text" style="text-transform:uppercase" placeholder="A-H" required pattern="[a-hA-H]">
                       </div>

                       <label for="sample_1_box_column">Box Column</label>  
                       <div>
                          <input id="sample_1_box_column" class="form-control" name="sample_1_box_column" type="text" placeholder="1-16" min="1" max="16" size="1" maxlength="2">
                       </div>
                    </div>
                  </div>


                  <div class="col-sm-6">
                    <legend>Sample 2</legend>
                    <div class="form-group">
                       <label for="sample_2_freezer_id">Freezer ID</label> 
                       <div>
                          <input id="sample_2_freezer_id" class="form-control" name="sample_2_freezer_id" type="text">
                       </div>

                       <label for="sample_2_freezer_rack">Freezer Rack</label> 
                       <div>
                          <input id="sample_2_freezer_rack" class="form-control" name="sample_2_freezer_rack" type="text">
                       </div>

                       <label for="sample_2_box_id">Box ID</label>  
                       <div>
                          <input id="sample_2_box_id" class="form-control" name="sample_2_box_id" type="text">
                       </div>

                       <label for="sample_2_box_row">Box Row</label>  
                       <div>
                          <input id="sample_2_box_row" class="form-control" name="sample_2_box_row" type="text" style="text-transform:uppercase" placeholder="A-H" required pattern="[a-hA-H]">
                       </div>

                       <label for="sample_2_box_column">Box Column</label>  
                       <div>
                          <input id="sample_2_box_column" class="form-control" name="sample_2_box_column" type="text" placeholder="1-16" min="1" max="16" size="1" maxlength="2">
                       </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-8">
                   <div class="form-group">
                      <button type="submit" class="btn btn-success">Submit</button>
                   </div>
                  </div>
                </div>

             </fieldset>
          </form>
       </div>
    </div>

        <script type="text/javascript">
            function search_by_id() {
                var patient_id= document.getElementById('patientID_form').value;
                window.location= "search.php?id=" + patient_id;
                return false;
            }
        </script>

        <script type="text/javascript">
            $(function () {
                $('#datetimepicker_visit_date').datetimepicker({
                  format: 'MM/DD/YYYY',
                  "defaultDate":new Date()
                });

                $('#datetimepicker_frozen_date').datetimepicker({
                  format: 'MM/DD/YYYY',
                  "defaultDate":new Date()
                });
            });
        </script>


        <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT',
                    "defaultDate":new Date()
                });
            });
        </script>

        <script src="js/header.js" type="text/javascript"></script>
    </body>
</html>
