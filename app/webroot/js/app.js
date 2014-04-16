var aclApp = angular.module('aclApp', [
  'ngRoute',
  'aclControllers'
]);

aclApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/login', {
        templateUrl: '/admin/users/login/',
        controller: 'UserCtrl'
      }).
      otherwise({
        redirectTo: '/login'
      });
}]);