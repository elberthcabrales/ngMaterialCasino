(function() {

	'use strict';

	angular
		.module('authApp')
		.controller('UserController', UserController);

	function UserController($http, logTest, $scope, webServiceFactory, $mdDialog, $mdToast) {


		var vm = this;
		vm.pager = {};
		vm.users=[];
		vm.error;
		$scope.q = '';
		
		$scope.idToEdit=-1;
		$scope.showCrear;
		$scope.idDeleted;
		$scope.Rol = ["Ecargado","Cajero"];
		$scope.errorErrors=[];

		$scope.showConfirm = function(ev,usuario) {
		    // Appending dialog to document.body to cover sidenav in docs app
		    var confirm = $mdDialog.confirm()
		          .title('Seguro que deseas restaurar al usuario '+usuario.name)
		          .textContent('si lo restauras el usuario tendrá acceso al sistema de nuevo')
		          .ariaLabel('comente al administrador')
		          .targetEvent(ev)
		          .ok('aceptar')
		          .cancel('cancelar');

		    $mdDialog.show(confirm).then(function() {
		        // ok
		        webServiceFactory.restoreUser(usuario).then(
				function(response){
					if(response){
						vm.getUsers()
						$mdToast.show(
						  $mdToast.simple()
						    .textContent('se restauro '+usuario.name)
						    .hideDelay(3000)
						);
					}
				},
				function(response){
						console.log("Error al restaurar :"+response )
				});
		    }, function() {
		      // cancel
		      console.log("se cancelo")
		    });
		 };
		$scope.PrepareToEdit = function(user){
			$scope.idToEdit=user.id;
			//console.log($("#botonx").text()); si entra jquery
		}
		$scope.PrepareToCreate = function(){

			$scope.showCrear=true;

		}
		$scope.Create = function(item){
			//console.log(item);
			webServiceFactory.createUser(item).then(function(response){
					 console.log(response);
					 // console.log(response);
					if(response.data.errors)
					{
					 $scope.errorErrors=[];
					 angular.forEach(response.data.errors,function(v,k){
									v.forEach(function(entry) {
									    // console.log(entry);
									    $scope.errorErrors.push(entry);
									});
							 });
					}else
					{
					 vm.getUsers();
					}
				},
				function(response){
						console.log("Error al crear  :"+response )
				});
		}
		//$scope.modelo="mi primero modelo con scope";

		vm.getUsers = function() {
			$scope.showCrear=false; //esconde el menu de crear
			// This request will hit the index method in the AuthenticateController
			// on the Laravel side and will return the list of users
			webServiceFactory.getUsers().success(function(users) {
					vm.users = users;
					$scope.idToEdit=-1;
					 vm.setPage(1);
					// console.log(users);
				}).error(function(error) {
					vm.error = error;
				});
		}

		$scope.eliminarUsuario = function(id){
			webServiceFactory.deleteUser(id).then(
				function(response){
					$scope.idDeleted=response.data.id;
				},
				function(response){
						console.log("fallo! :"+response )
				});
		}
	
		
		$scope.actualizarUsuario = function(data){
		
		  //if(logTest.esEmail(data.email)){
		  
			webServiceFactory.updateUser(data).then(
				function(response){
					// console.log(response.data.errors);
					 
					 angular.forEach(vm.users, function(value, key) {
					 	 //key es el numero de iteracion
 					     //console.log("calve : "+key);
 					     //console.log("valor : "+value.id);
 					     if (value.id === response.data.user.id) {
			                 value.email=response.data.user.email;
			                 value.name=response.data.user.name;
			                  angular.forEach(response.data.errors.email,function(v,k){
									 value.messagemail="no se actualizo el email "+v;		
							 });
			                angular.forEach(response.data.errors.name,function(v,k){
									 value.messagename="no se actualizo el nombre "+v;		
							 });
			                angular.forEach(response.data.errors.password,function(v,k){
									 value.messagepassord="no se actualizo el la contraseña "+v;		
							 });
			             }
			             
					 });
					 
					 $scope.idToEdit=-1;
					 vm.getUsers();
				},
				function(response){
						console.log("Error al actualizar :"+response )
				});
		}

		vm.watch = function(){
			return logTest.esNumero();
		}
		/*prueba de $scope
		$scope.test= "hola mundo";
		$scope.testFuncion = function(){
			console.log('funcion llamada desde $scope');
		}
		*/		
		
	 
	    vm.setPage = function(page) {
	        if (page < 1 || page > vm.pager.totalPages) {
	            return;
	        }
	 
	        // get pager object from service
	        vm.pager = logTest.GetPager(vm.users.length, page,5 );
	 
	        // get current page of items
	        vm.items = vm.users.slice(vm.pager.startIndex, vm.pager.endIndex + 1);
	    	//console.log("entra metodo setPage");
	    }
	    //para correrlo al iniciar
	   /* initController();
 
	    function initController() {
	        // initialize to page 1
	         vm.setPage(1);
	    }*/
	  }
})();
