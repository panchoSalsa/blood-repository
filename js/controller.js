// views/search-
app.controller('SearchBloodSamples', ['$scope', '$window', '$location', '$http', 'MyFactory', 
    function($scope, $window, $location, $http, MyFactory) {

    $scope.id = "";
    $scope.blood_samples = [];

    $scope.redirect_to_blood_sample_location = function(id) {
            MyFactory.redirect('../views/blood-sample-location.php?blood_sample_id='+ id);
    }

    $scope.queryDatabase = function(query_object) {
            MyFactory.filter_blood_samples(query_object)
                .then(function(res) {
                    $scope.blood_samples = res.data;
            });
    };




    // logic for jQueryBuilder

    // fetch records as rule values get updated in front-end
    $('#builder').on('afterUpdateRuleValue.queryBuilder', function(e, rule) {
        // only hit API if rule value is not empty
        
        if (rule.value) {
            DisplayRecords();
        }
    });


    $('#builder').on('afterDeleteRule.queryBuilder', function(e, rule) {

            if ($('#builder').queryBuilder('validate')) {
                DisplayRecords();
            } else {
                // must call $apply in order to display 0 rows in the view
                // if $apply is not used, then the view will not be updated
                
                $scope.$apply(function() {
                    $scope.blood_samples = [];
                });
            }
    });

    function DisplayRecords() {
            var result = $('#builder').queryBuilder('getSQL');
            // must set formData before calling $scope.queryDatabase() because 
            // a post request is sent using formData as the parameter

            var query_object = {'query': result.sql};
            $scope.queryDatabase(query_object);
    }
}]);      

// /views/blood-sample-location.php controller
app.controller('SearchByBloodSampleID', ['$scope', '$window', '$location', '$http', 'MyFactory', 
    function($scope, $window, $location, $http, MyFactory) {

    // to read from url params
    // 1) add access file, source=https://www.digitalocean.com/community/tutorials/how-to-use-the-htaccess-file
    // 2) config app, source=https://stackoverflow.com/questions/36573129/access-url-parameters-in-angularjs-in-the-controller

    var id = $location.search().blood_sample_id;

    var request_body = {'id' : id};

    $scope.blood_sample = '';

    MyFactory.get_blood_sample(request_body)
        .then(function(res) {
                $scope.blood_sample = res.data[0];
        });
}]);   