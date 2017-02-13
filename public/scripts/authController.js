(function() {

	'use strict';

	angular
		.module('authApp')
		.controller('AuthController', AuthController);


	function AuthController($auth, $state, $scope, $cookieStore) {

		var vm = this;

		vm.login = function() {

			var credentials = {
				email: vm.email,
				password: vm.password
			}

			// Use Satellizer's $auth service to login
			$auth.login(credentials).then(function(data) {

				// If login is successful, redirect to the users state
				//$cookies.put('usuario', data.config.data.email);
				$cookieStore.put('email', data.config.data.email);
				$state.go('registros');
			}, function(error) {
				console.log(error);
			});
		}
		vm.isAuthenticated = function() {
			  return $auth.isAuthenticated();
			};

	}

})();