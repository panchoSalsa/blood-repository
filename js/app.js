var app = angular.module('BloodRepositoryApp', []);

// config app, source=https://stackoverflow.com/questions/36573129/access-url-parameters-in-angularjs-in-the-controller
app.config(['$locationProvider',function($locationProvider){    
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: true,
    	rewriteLinks: false});
}]);