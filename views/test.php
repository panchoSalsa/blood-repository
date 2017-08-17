<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">

        <title>Add Blood Samples</title>
        
        <link rel="stylesheet" href="../css/ui.tabs.css" type="text/css" media="print, projection, screen"/>
        <link rel="stylesheet" href="../css/base.css" type="text/css"/>
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



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
            include '../authentication/check-authentication.php';
            include 'header.php';
        ?>

    <!-- source=https://bootsnipp.com/snippets/GXG0R -->

    <div class="container-colored-md bg-2-md">
       <div class="container">
          <form id="add-blood-sample-form">
             <fieldset class="scheduler-border">
                <legend class="scheduler-border">Blood Sample Form</legend>

                <div class="row">

                  <div class="col-sm-4">
                   <label for="patient_id">Patient ID</label>  
                   <div>
                      <input id="patient_id" class="form-control" name="patient_id" type="text" value="901">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <label for="visit">Visit</label> 
                   <div>
                      <input id="visit" class="form-control" name="visit" type="text" value ="3">
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

                      <div class="row">
                        <div class="form-group">

                          <div class="col-sm-6">
                           <label for="sample_1_freezer_id">Freezer ID</label> 
                           <div>
                              <select id="sample_1_freezer_id" class="form-control" name="sample_1_freezer_id" type="text">
                              </select>
                           </div>
                         </div>

                          <div class="col-sm-6">
                           <label for="sample_1_freezer_rack">Freezer Rack</label> 
                           <div>
                              <select id="sample_1_freezer_rack" class="form-control" name="sample_1_freezer_rack" type="text">
                              </select>
                           </div>
                         </div>

                        </div>
                      </div>

                    <div class="row">
                      <div class="form-group">

                        <div class="col-sm-4">
                         <label for="sample_1_box_id">Box ID</label>  
                         <div>
                            <select id="sample_1_box_id"  class="form-control" name="sample_1_box_id" type="text">
                            </select>
                         </div>
                       </div>

                        <div class="col-sm-4">
                         <label for="sample_1_box_row">Box Row</label>  
                         <div>
                            <input id="sample_1_box_row" class="form-control" name="sample_1_box_row" type="text" class="text-uppercase" placeholder="A-H" required pattern="[a-hA-H]" value="B">
                         </div>
                       </div>

                        <div class="col-sm-4">
                         <label for="sample_1_box_column">Box Column</label>  
                         <div>
                            <input id="sample_1_box_column" class="form-control" name="sample_1_box_column" type="text" placeholder="1-16" min="1" max="16" size="1" maxlength="2" value="5">
                         </div>
                       </div>

                      </div>
                    </div>


                    <div class="row">
                      <div class="form-group">

                        <div class="col-sm-6">
                         <label for="sample_1_serum_count">Serum Count</label> 
                         <div>
                            <input id="sample_1_serum_count" class="form-control" name="sample_1_serum_count" type="text" value ="4" required pattern="[0-4]">
                         </div>
                       </div>

                        <div class="col-sm-6">
                         <label for="sample_1_plasma_count">Plasma Count</label>  
                         <div>
                            <input id="sample_1_plasma_count" class="form-control" name="sample_1_plasma_count" type="text" value="4" required pattern="[0-4]">
                         </div>
                       </div>

                      </div>
                    </div>
                  </div>


                  <div class="col-sm-6">
                    <legend>Sample 2</legend>

                      <div class="row">
                        <div class="form-group">

                          <div class="col-sm-6">
                           <label for="sample_2_freezer_id">Freezer ID</label> 
                           <div>
                              <select id="sample_2_freezer_id" class="form-control" name="sample_2_freezer_id" type="text">
                              </select>
                           </div>
                         </div>

                          <div class="col-sm-6">
                           <label for="sample_2_freezer_rack">Freezer Rack</label> 
                           <div>
                              <select id="sample_2_freezer_rack" class="form-control" name="sample_2_freezer_rack" type="text">
                              </select>
                           </div>
                         </div>

                        </div>
                      </div>


                    <div class="row">
                      <div class="form-group">

                        <div class="col-sm-4">
                           <label for="sample_2_box_id">Box ID</label>  
                           <div>
                              <select id="sample_2_box_id"  class="form-control" name="sample_2_box_id" type="text">
                            </select>
                           </div>
                        </div>

                        <div class="col-sm-4">
                         <label for="sample_2_box_row">Box Row</label>  
                         <div>
                            <input id="sample_2_box_row" class="form-control" name="sample_2_box_row" type="text" class="text-uppercase" placeholder="A-H" required pattern="[a-hA-H]" value="C">
                         </div>
                       </div>

                        <div class="col-sm-4">
                         <label for="sample_2_box_column">Box Column</label>  
                         <div>
                            <input id="sample_2_box_column" class="form-control" name="sample_2_box_column" type="text" placeholder="1-16" min="1" max="16" size="1" maxlength="2" value ="1">
                         </div>
                       </div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">

                        <div class="col-sm-6">
                         <label for="sample_2_serum_count">Serum Count</label> 
                         <div>
                            <input id="sample_2_serum_count" class="form-control" name="sample_2_serum_count" type="text" value ="4" required pattern="[0-4]">
                         </div>
                       </div>

                        <div class="col-sm-6">
                         <label for="sample_2_plasma_count">Plasma Count</label>  
                         <div>
                            <input id="sample_2_plasma_count" class="form-control" name="sample_2_plasma_count" type="text" value="4" required pattern="[0-4]">
                         </div>
                       </div>

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

                $('#datetimepicker3').datetimepicker({
                    format: 'LT',
                    "defaultDate":new Date()
                });


                $.ajax({
                     url: "../search/get-freezers.php",
                     type: "GET",
                     success: function (response) {
                      // php returns a JSON string response.
                      // we need to turn the response into a JSON object
                      let jsonArray = JSON.parse(response);

                      var listitems = '';
                      for (i = 0; i < jsonArray.length; ++i) {
                         listitems += '<option value=' + jsonArray[i].id + '>' + jsonArray[i].title  + '</option>';
                      }

                      // populate select inputs for freezer available
                      $('#sample_1_freezer_id').append(listitems);
                      $('#sample_1_freezer_id').prop("selectedIndex", -1);
                      $('#sample_2_freezer_id').append(listitems);
                      $('#sample_2_freezer_id').prop("selectedIndex", -1);
                     }
                });


                $('#sample_1_freezer_id').on('change', function() {

                  // clear freezer_rack options
                  $('#sample_1_freezer_rack').empty();
                  $('#sample_1_box_id').empty();

                  var data = {fid: parseInt(this.value)};

                  $.ajax({
                     url: "../search/get-racks.php",
                     type: "POST",
                     data: data,
                     success: function (response) {
                      // php returns a JSON string response.
                      // we need to turn the response into a JSON object
                      let jsonArray = JSON.parse(response);

                      var listitems = '';
                      for (i = 0; i < jsonArray.length; ++i) {
                         listitems += '<option value=' + jsonArray[i].id + '>' + jsonArray[i].title  + '</option>';
                      }

                      // populate select inputs for freezer available
                      $('#sample_1_freezer_rack').append(listitems);
                      $('#sample_1_freezer_rack').prop("selectedIndex", -1);
                     }
                  });
                });

                $('#sample_2_freezer_id').on('change', function() {

                  // clear freezer_rack options
                  $('#sample_2_freezer_rack').empty();
                  $('#sample_2_box_id').empty();

                  var data = {fid: parseInt(this.value)};

                  $.ajax({
                     url: "../search/get-racks.php",
                     type: "POST",
                     data: data,
                     success: function (response) {
                      // php returns a JSON string response.
                      // we need to turn the response into a JSON object
                      let jsonArray = JSON.parse(response);

                      var listitems = '';
                      for (i = 0; i < jsonArray.length; ++i) {
                         listitems += '<option value=' + jsonArray[i].id + '>' + jsonArray[i].title  + '</option>';
                      }

                      // populate select inputs for freezer available
                      $('#sample_2_freezer_rack').append(listitems);

                      $('#sample_2_freezer_rack').prop("selectedIndex", -1);
                     }
                  });
                });


                $('#sample_1_freezer_rack').on('change', function() {

                  // clear freezer_rack options
                  $('#sample_1_box_id').empty();

                  var data = {rid: parseInt(this.value)};

                  $.ajax({
                     url: "../search/get-boxes.php",
                     type: "POST",
                     data: data,
                     success: function (response) {
                      // php returns a JSON string response.
                      // we need to turn the response into a JSON object
                      let jsonArray = JSON.parse(response);

                      var listitems = '';
                      for (i = 0; i < jsonArray.length; ++i) {
                         listitems += '<option value=' + jsonArray[i].id + '>' + jsonArray[i].title  + '</option>';
                      }

                      // populate select inputs for freezer available
                      $('#sample_1_box_id').append(listitems);

                      $('#sample_1_box_id').prop("selectedIndex", -1);
                     }
                  });
                });


                $('#sample_2_freezer_rack').on('change', function() {

                  // clear freezer_rack options
                  $('#sample_2_box_id').empty();

                  var data = {rid: parseInt(this.value)};

                  $.ajax({
                     url: "../search/get-boxes.php",
                     type: "POST",
                     data: data,
                     success: function (response) {
                      // php returns a JSON string response.
                      // we need to turn the response into a JSON object
                      let jsonArray = JSON.parse(response);

                      var listitems = '';
                      for (i = 0; i < jsonArray.length; ++i) {
                         listitems += '<option value=' + jsonArray[i].id + '>' + jsonArray[i].title  + '</option>';
                      }

                      // populate select inputs for freezer available
                      $('#sample_2_box_id').append(listitems);

                      $('#sample_2_box_id').prop("selectedIndex", -1);
                     }
                  });
                });


                $("#add-blood-sample-form").submit(function(e) {

                      var url = "../create/blood-sample.php"; // the script where you handle the form input.

                      $.ajax({
                             type: "POST",
                             url: url,
                             data: $("#add-blood-sample-form").serialize(), // serializes the form's elements.
                             success: function(data) {
                                // blood sample successfully created show vials
                                

                                alert('Blood Sample Created');

                                // window.location = "../search/vials.php?blood_sample_id=" + data;
                                //window.location = "../views/vials.php?blood_sample_id=" + data;
                             }
                           });

                      e.preventDefault(); // avoid to execute the actual submit of the form.
                  });
            });
        </script>
    </body>
</html>