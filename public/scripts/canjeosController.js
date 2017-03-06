(function() {

	'use strict';

	angular
		.module('authApp')
		.controller('CanjeosController', CanjeosController);

	function CanjeosController($scope) {
		$scope.test="hola desde context";
	}
	
})();