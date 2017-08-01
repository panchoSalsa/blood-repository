var app = angular.module('BloodRepositoryApp', []);

app.config(['$locationProvider',function($locationProvider){    
    $locationProvider.html5Mode({
        enabled: true,
    	requireBase: true});
}]);