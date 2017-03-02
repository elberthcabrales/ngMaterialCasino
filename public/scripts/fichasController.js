(function() {

	'use strict';

	angular
		.module('authApp')
		.controller('FichasController', FichasController);
	function FichasController($mdEditDialog, $q, $scope, $timeout,$http) {

	  $scope.selected = [];
	  $scope.limitOptions = [5, 10, 15];
	  
	  $scope.options = {
	    rowSelection: true,
	    multiSelect: true,
	    autoSelect: true,
	    decapitate: false,
	    largeEditDialog: false,
	    boundaryLinks: false,
	    limitSelect: true,
	    pageSelect: true
	  };
	  
	  $scope.query = {
	    order: 'name',
	    limit: 5,
	    page: 1
	  };
	  
	  $scope.desserts = [];

	  $http.get("http://homestead.app/scripts/nuticion.json").success(function(response){
	  	$scope.desserts = response;
	  });

	  $scope.editComment = function (event, dessert) {
	    event.stopPropagation(); // in case autoselect is enabled
	    // console.log(dessert);
	    var editDialog = {
	      modelValue: dessert.comment,
	      placeholder: 'Add a comment',
	      save: function (input) {
	        if(input.$modelValue === 'Donald Trump') {
	          input.$invalid = true;
	          return $q.reject();
	        }
	        if(input.$modelValue === 'Bernie Sanders') {
	          return dessert.comment = 'FEEL THE BERN!'
	        }
	        dessert.comment = input.$modelValue;
	      },
	      targetEvent: event,
	      title: 'Add a comment',
	      validators: {
	        'md-maxlength': 30
	      },
	      messages: 'hola',

	     };
	    
		var promise;
		    
	    if($scope.options.largeEditDialog) {
	      promise = $mdEditDialog.large(editDialog);
	    } else {
	      promise = $mdEditDialog.small(editDialog);
	    }
	    
	    promise.then(function (ctrl) {
	      var input = ctrl.getInput();
	      
	      input.$viewChangeListeners.push(function () {
	        input.$setValidity('test', input.$modelValue !== 'test');
	      });
	     });
	    };
		
		$scope.toggleLimitOptions = function () {
		  $scope.limitOptions = $scope.limitOptions ? undefined : [5, 10, 15];
		};
		  
		$scope.getTypes = function () {
		  return ['Candy', 'Ice cream', 'Other', 'Pastry'];
		};
		  
	    $scope.loadStuff = function () {
	 	  $scope.promise = $timeout(function () {
		    var deferred = $q.defer();
 		   $scope.promise = deferred.promise;   
			  $http.get("http://homestead.app/scripts/nuticion.json").success(function(response){
			  	$scope.desserts = response;
			  });
			 deferred.resolve();
		  //     console.log("puedes correr algo");
		  }, 500);
	    }
		  
		$scope.logItem = function (item) {
		  // console.log(item, 'was selected');
		};
		
		$scope.logItemDes = function (item) {
		  alert(item.name);
	    }; 
	   $scope.logOrder = function (order) {
	     console.log('order: ', order);
	   };
		  
	   $scope.logPagination = function (page, limit) {
	     console.log('page: ', page);
		 console.log('limit: ', limit);
	   };
	   $scope.borrar= function(item){
	   	 angular.forEach(item,function(v,k){
			var index=$scope.desserts.data.indexOf(v); //de aqui removeremos el item seleccionado
			$scope.desserts.data.splice(index,1);
		 });
	   }
}
	
})();

