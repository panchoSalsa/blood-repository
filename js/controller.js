// views/search-
app.controller('SearchByPatientID', ['$scope', '$window', '$location', '$http', 'MyFactory', 
    function($scope, $window, $location, $http, MyFactory) {

    $scope.id = "";
    $scope.blood_samples = [];


    $scope.search_blood_samples_by_patient_id = function(id) {
        if ($scope.id !== "") {
 
            var request_body = {'id' : id};
            
            MyFactory.search_blood_samples_by_patient_id(request_body)
                .then(function(res) {
                    console.log(res);
                    $scope.blood_samples = res.data;
            });
        
        } else {
            $scope.blood_samples = [];
        }
    }

    $scope.redirect_to_vials = function(id) {
            MyFactory.redirect('../views/search-vials-by-blood-sample-id.php?blood_sample_id='+ id);
    }
}]);      




// views/search-vials-by-blood-sample-id controller
app.controller('SearchByBloodSampleID', ['$scope', '$window', '$location', '$http', 'MyFactory', 
    function($scope, $window, $location, $http, MyFactory) {

    // to read from url params
    // 1) add access file, source=https://www.digitalocean.com/community/tutorials/how-to-use-the-htaccess-file
    // 2) config app, source=https://stackoverflow.com/questions/36573129/access-url-parameters-in-angularjs-in-the-controller

    $scope.id = $location.search().blood_sample_id;

    $scope.vials = [];

    $scope.search_vials_by_blood_sample = function(id) {
            if ($scope.id !== "") {
 
                var request_body = {'id' : id};
                
                MyFactory.search_vials_by_blood_sample_id(request_body)
                    .then(function(res) {
                        console.log(res);
                        $scope.vials = res.data;
                });
            
            } else {
                $(function() {
                    $scope.vials = [];
                    $scope.id = "";
                });
            }
    }

    // check if $scope.id is undefined due to $scope.id = $location.search().blood_sample_id;
    // check if $scope.id is empty

    // we will $scope.search_vials_by_blood_sample($scope.id) once if there is a url parameter.
    // ex:http://iba05.brainaging.uci.edu/views/search-vials-by-blood-sample-id.php?blood_sample_id=97

    if (typeof $scope.id !== "undefined" &&  $scope.id !== "")  {
        $scope.search_vials_by_blood_sample($scope.id);
    } else {
        $scope.id = "";
    }




    $scope.delete_vial = function(id) {
        
        var request_body = {'id' : id};

        console.log(request_body);

        MyFactory.delete_vial(request_body)
            .then(function(res) {
                console.log(res);

                if (!res.data.error) {
                    $scope.search_vials_by_blood_sample($scope.id);
                }
        });
    }
}]);   