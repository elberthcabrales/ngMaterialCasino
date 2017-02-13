(function(){
	"use strict";
	angular
	.module("authApp")
	.factory('webServiceFactory', function($http){
		function getUsers(){
			return $http.get('api/user');
		}
		function deleteUser(id)
		{

			//return $http.post('api/user/delete/:id',{id:id});
			return $http.delete('api/user/'+id);
		}
		function updateUser(data)
		{

			return $http.put('api/user/update/',data);
		}
		function createUser(data)
		{
			return $http.post('api/user',data);
		}
		return{
			getUsers  : getUsers,
			deleteUser: deleteUser,
			updateUser: updateUser,
			createUser: createUser
		}

	});
})();