angular.module('BloodRepositoryApp')
.factory('MyFactory', ['$http', '$window', function($http, $window) {
	return {
		redirect : function(relative_path) {
			//return $http.post('redirection.html', userData);
			$window.location.href = relative_path;
		},
		read_all: function() {
			// return [
		 //    	{
		 //    		"id" : "712",
		 //    		"visit": 5 + patient_id,
		 //    		"serum_count" : 2,
		 //    		"plasma_count" : 2,
		 //    		"frozen_date" : "2017-04-25"
		 //    	},
		 //    	{
		 //    		"id" : "1973",
		 //    		"visit": 10 + patient_id,
		 //    		"serum_count" : 2,
		 //    		"plasma_count" : 1,
		 //    		"frozen_date" : "2017-05-12"
		 //    	}
		 //    ];
		 	return $http.get('search-backend.php');
		},
		read_one: function(request_body) {
			console.log(request_body);
			//return $http.get('category/read_one.php', request_body);
			// return $http ({
			// 	method: 'GET',
			// 	url: 'category/read_one.php',
			// 	data: request_body,
			// 	'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8',
			// })
	console.log(JSON.stringify(request_body));

			return $http.post ('category/read_one.php', {
				data: $.param({'data' : request_body}),
				headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8;'}
			});

		},

		search_by_id: function(request_body) {
			// return $http.post('../search-backend.php', request_body);
			return $http.post('../search/blood-samples-by-patient-id.php', request_body);
		},

		search_vials_by_blood_sample_id: function(request_body) {
			return $http.post('../search/vials.php', request_body);
		},
	};
}]);