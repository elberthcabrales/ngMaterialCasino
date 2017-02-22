(function() {

	'use strict';

	angular
		.module('authApp').controller('NavController', NavController);


	function NavController($auth,$scope, $state, $location, $cookieStore,$mdSidenav) {
			var vm = this;
			vm.email="";
			vm.barnav=true;
		// Controller
			vm.isAuthenticated = function() {
			  if($auth.isAuthenticated()){
			  	vm.email = $cookieStore.get('email');
			  	return true;

			  }else{
			  	$location.path('/auth');
			  	return false;
			  }
			  
			};

			vm.isActive = function(destination) {
				//console.log(destination===$location.path());
			    return destination===$location.path();
			};
			vm.logOut = function(){
				//console.log("entro");
				$cookieStore.remove('email');
				$auth.logout();
			};
			$scope.openSidebar = function() {
	          //$scope.sidebarTitle = 'Add a Classified';
	          $mdSidenav('sidenaveLeft').open();
	        }
			  
		}


})();