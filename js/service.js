angular.module('BloodRepositoryApp')
.factory('MyFactory', ['$http', '$window', function($http, $window) {
	return {

		delete_vial : function(request_body) {
			return $http.post('../destroy/vial.php', request_body);
		},

		redirect : function(relative_path) {
			//$window.location.href = relative_path;

			// open new browser tab
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