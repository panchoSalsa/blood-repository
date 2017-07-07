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
          <form action="test.php" method="POST">
             <fieldset class="scheduler-border">
                <legend class="scheduler-border">Blood Sample Form</legend>

<!--                 <div class="form-group"> -->
<!--                    <label for="study">Study</label> 
                   <div>
                      <input id="study" class="form-control" name="study" type="text">
                    </div> -->

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

<!-- 
                    <label for="visit_date">Visit Date</label>  
                    <div>
                      <input id="visit_date" class="form-control" name="visit_date" type="text" placeholder="MM/DD/YYYY" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                   </div> -->
                  </div>
                </div>


<!-- 
                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

<!--                    <label for="synd">Syndrome</label>  
                   <div>
                      <input id="synd" class="form-control" name="synd" type="text">
                   </div>
                   <label for="mci_cat">MCI Cat</label> 
                   <div>
                      <input id="mci_cat" class="form-control" name="mci_cat" type="text">
                    </div>
                   <label for="dx">DX</label>  
                   <div>
                      <input id="dx" class="form-control" name="dx" type="text">
                   </div> -->

<!--                   <label for="visit_date">Visit Date</label>  
                    <div>
                      <input id="visit_date" class="form-control" name="visit_date" type="text" placeholder="MM/DD/YYYY" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                   </div> -->
<!--                    <label for="age">Age</label> 
                   <div>
                      <input id="age" class="form-control" name="age" type="text">
                    </div>
                   <label for="sex">Sex</label>  
                   <div>
                      <input id="sex" class="form-control" name="sex" type="text">
                   </div>
                   <label for="mmse">MMSE</label> 
                   <div>
                      <input id="mmse" class="form-control" name="mmse" type="text">
                    </div> -->
<!--                    <label for="draw_date">Draw Date</label>  
                   <div>
                      <input id="draw_date" class="form-control" name="draw_date" type="text" placeholder="MM/DD/YYYY" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                   </div> -->
<!--                    <label for="draw_time">Draw Time</label> 
                   <div>
                      <input id="draw_time" class="form-control" name="draw_time" type="text">
                    </div> -->


                    <!-- staff should be the uci_net_id -->
<!--                    <label for="staff">Staff</label>  
                   <div>
                      <input id="staff" class="form-control" name="staff" type="text">
                   </div> -->


                <div class="row">
                  <div class="col-sm-4">
                   <label for="freezer_id">Freezer ID</label> 
                   <div>
                      <input id="freezer_id" class="form-control" name="freezer_id" type="text">
                    </div>
                  </div>

                  <div class="col-sm-4">
                   <label for="freezer_rack">Freezer Rack</label> 
                   <div>
                      <input id="freezer_rack" class="form-control" name="freezer_rack" type="text">
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




<!--                    <label for="frozen_date">Frozen Date</label> 
                   <div>
                      <input id="frozen_date" class="form-control" name="frozen_date" type="text" placeholder="MM/DD/YYYY" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                    </div>
                  </div> -->
                </div>

<!--                    <label for="freezer_id">Freezer ID</label> 
                   <div>
                      <input id="freezer_id" class="form-control" name="freezer_id" type="text">
                    </div>
                   <label for="freezer_rack">Freezer Rack</label> 
                   <div>
                      <input id="freezer_rack" class="form-control" name="freezer_rack" type="text">
                    </div>
                   <label for="frozen_date">Frozen Date</label> 
                   <div>
                      <input id="frozen_date" class="form-control" name="frozen_date" type="text" placeholder="MM/DD/YYYY" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                    </div> -->
<!--                    <label for="frozen_time">Frozen Time</label>  
                   <div>
                      <input id="frozen_time" class="form-control" name="frozen_time" type="text">
                   </div> -->
<!--                    <label for="created_by">Created By</label> 
                   <div>
                      <input id="created_by" class="form-control" name="created_by" type="text">
                    </div>
                   <label for="created_date">Created Date</label> 
                   <div>
                      <input id="created_date" class="form-control" name="created_date" type="text" placeholder="MM/DD/YYYY" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                    </div>

                   <label for="modified_by">Modified By</label>  
                   <div>
                      <input id="modified_by" class="form-control" name="modified_by" type="textarea">
                   </div>
                   <label for="modified_date">Modified Date</label>  
                   <div>
                      <input id="modified_date" class="form-control" name="modified_date" type="textarea" placeholder="MM/DD/YYYY" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                   </div> -->
<!--                    <label for="comments">Comments</label> 
                   <div>
                      <textarea id="comments" class="form-control" name="comments" rows="4"></textarea>
                   </div> -->
                </div>


<!-- source=https://eonasdan.github.io/bootstrap-datetimepicker/#custom-icons -->
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker3'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="row">
                  <div class="col-sm-6">
                    <legend>Sample 1</legend>
                    <div class="form-group">
                       <label for="sample_1_box_id">Box ID</label>  
                       <div>
                          <input id="sample_1_box_id" class="form-control" name="sample_1_box_id" type="text">
                       </div>
                       <label for="sample_1_box_row">Box Row</label>  
                       <div>
                          <input id="sample_1_box_rowv" class="form-control" name="sample_1_box_row" type="text" placeholder="A-H" required pattern="[A-H]">
                       </div>
                       <label for="sample_1_box_column">Box Column</label>  
                       <div>
                          <input id="sample_1_box_column" class="form-control" name="sample_1_box_column" type="text" placeholder="1-16" required pattern="[1-9]{2}">
                       </div>
                    </div>
                  </div>


                  <div class="col-sm-6">
                    <legend>Sample 2</legend>
                    <div class="form-group">
                       <label for="sample_2_box_id">Box ID</label>  
                       <div>
                          <input id="sample_2_box_id" class="form-control" name="sample_2_box_id" type="text">
                       </div>
                       <label for="sample_2_box_row">Box Row</label>  
                       <div>
                          <input id="sample_2_box_rowv" class="form-control" name="sample_2_box_row" type="text" placeholder="A-H" required pattern="[A-H]">
                       </div>
                       <label for="sample_2_box_column">Box Column</label>  
                       <div>
                          <input id="sample_2_box_column" class="form-control" name="sample_2_box_column" type="text" placeholder="1-16" required pattern="[1-9]{2}">
                       </div>
                    </div>
                  </div>
                </div>

                <!-- Button (Double) -->
<!--                 <div class="row">
                <div class="form-group">
                   <div class="col-md-8">
                      <button type="submit" class="btn btn-success">Submit</button>
                   </div>
                </div> -->

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
                  format: 'MM/DD/YYYY'
                });

                $('#datetimepicker_frozen_date').datetimepicker({
                  format: 'MM/DD/YYYY'
                });
            });
        </script>


        <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
        </script>

        <script src="js/header.js" type="text/javascript"></script>
    </body>
</html>
