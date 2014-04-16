var aclControllers = angular.module('aclControllers', []);
 
aclControllers.controller('UserCtrl', ['$scope', '$http',
  function ($scope, $http) {
    // function to submit the form after all validation has occurred			
		$scope.submitForm = function(event) {

			event.preventDefault();
			// check to make sure the form is completely valid
			if ($scope.UserLoginForm.$valid) {
				$http.post('/admin/users/login', $scope.data).success(function(data) {
		          
		       });
			}



		};
 }]);
