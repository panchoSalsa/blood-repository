app.controller('MainCtrl', ['$scope', '$window', '$location', '$http', 'MyFactory', 
	function($scope, $window, $location, $http, MyFactory) {

        $scope.patient_id = "";
        $scope.blood_samples = [];


        MyFactory.read_all($scope.patient_id)
            .then(function(res) {
                console.log(res);
                $scope.blood_samples = res.data;
                console.log($scope.blood_samples);
        });

        $scope.func = function(id) {
        	console.log('clicking on id ' + id);
        	MyFactory.redirect('redirection.html');
        }

        $scope.read_all = function() {
            if ($scope.patient_id !== "") {
                MyFactory.read_all($scope.patient_id)
                    .then(function(res) {
                        console.log(res);
                        $scope.blood_samples = res.data;
                        console.log($scope.blood_samples);
                    });
            } else {
                $scope.blood_samples = [];
            }
        }

        $scope.read_one = function(id) {
            // if ($scope.patient_id !== "") {
            //     MyFactory.read_all($scope.patient_id)
            //         .then(function(res) {
            //             $scope.blood_samples = res.data;
            //         });
            // } else {
            //     $scope.blood_samples = [];
            // }

            var request_body = {'id' : id};
            // MyFactory.read_one(request_body)
            //     .then(function(res) {
            //         $scope.blood_samples = res.data;
            //          console.log(res);

            //         console.log($scope.blood_samples);
            //     });


            console.log('search for id: ' + id);

            $http({
                method: 'POST',
                url: 'category/read_one.php',
                data: request_body
            }).
            success(function(response) {
                console.log(response);
                $scope.blood_samples = response;
            }).
            error(function(response) {
                console.log("Request failed");
            });
        }



    // $scope.blood_samples = [
    // 	{
    // 		"id" : "703",
    //         "visit": 2,
    // 		"serum_count" : 3,
    // 		"plasma_count" : 6,
    // 		"frozen_date" : "2017-07-25"
    // 	},
    // 	{
    // 		"id" : "2873",
    //         "visit": 19,
    // 		"serum_count" : 4,
    // 		"plasma_count" : 4,
    // 		"frozen_date" : "2017-07-31"
    // 	}
    // ]
}]);






app.controller('SearchByPatientID', ['$scope', '$window', '$location', '$http', 'MyFactory', 
    function($scope, $window, $location, $http, MyFactory) {

    $scope.id = "";
    $scope.blood_samples = [];


    $scope.search_by_id = function(id) {
        if ($scope.id !== "") {
 
            var request_body = {'id' : id};
            console.log('search for id: ' + id);
            
            MyFactory.search_by_id(request_body)
                .then(function(res) {
                    console.log(res);
                    $scope.blood_samples = res.data;
            });
        
        } else {
            $scope.blood_samples = [];
        }
    }


    $scope.func = function(id) {
            MyFactory.redirect('../views/search-vials-by-blood-sample-id.php?blood_sample_id='+ id);
    }
}]);      



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
                console.log('search for id: ' + id);
                
                MyFactory.search_vials_by_blood_sample_id(request_body)
                    .then(function(res) {
                        console.log(res);
                        $scope.vials = res.data;
                });
            
            } else {
                $(function() {
                    $scope.vials = [];
                });
            }
    }

    $scope.search_vials_by_blood_sample($scope.id);
}]);   