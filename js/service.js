angular.module('BloodRepositoryApp')
.factory('MyFactory', ['$http', '$window', function($http, $window) {
	return {
		redirect : function(relative_path) {
			// open new browser tab
			$window.open(relative_path, "_blank");
		},
		
		get_blood_sample: function(request_body) {
			return $http.post('../search/get-blood-sample.php', request_body);
		},

		filter_blood_samples : function(request_body) {
			return $http.post('../search/get-filtered-blood-samples.php', request_body);
		} 
	};
}]);