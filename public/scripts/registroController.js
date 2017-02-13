(function() {

	'use strict';

	angular
		.module('authApp')
		.controller('RegistroController', RegistroController);

	function RegistroController($http) {

		var vm = this;

		vm.registros;
		vm.error;

		vm.getAll = function() {

			// This request will hit the index method in the AuthenticateController
			// on the Laravel side and will return the list of users
			$http.get('api/registro').success(function(registro) {
				console.log(registro);
				vm.registros = registro;
			}).error(function(error) {
				vm.error = error;
			});
		}
	}
	
})();