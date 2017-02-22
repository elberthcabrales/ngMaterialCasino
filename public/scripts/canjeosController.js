(function() {

	'use strict';

	angular
		.module('authApp')
		.controller('CanjeosController', CanjeosController);

	function CanjeosController($http, $scope, webServiceFactory) {

		var vm = this;

		vm.test="hola desde context";
		$scope.titulo ="hola mundo desde canjeos controller";
		$scope.gridOptions = {
            data: [],
            urlSync: false
        };

        webServiceFactory.getData().then(function (responseData) {
            $scope.gridOptions.data = responseData.data;
            console.log(responseData);
        });

	}
	
})();