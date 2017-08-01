angular.module('BloodRepositoryApp')
.factory('MyFactory', ['$http', '$window', function($http, $window) {
	return {
		redirect : function(relative_path) {
			//$window.location.href = relative_path;
			$window.open(relative_path, "_blank");
		},
		
		search_blood_samples_by_patient_id: function(request_body) {
			return $http.post('../search/blood-samples-by-patient-id.php', request_body);
		},

		search_vials_by_blood_sample_id: function(request_body) {
			return $http.post('../search/vials-by-blood-sample-id.php', request_body);
		},
	};
}]);