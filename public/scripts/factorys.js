(function(){
	"use strict";
	angular
	.module("authApp")
	.factory('webServiceFactory', function($http){
		function getUsers(){
			// console.log(CSRF_TOKEN);
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
		function restoreUser(data)
		{
			return $http.post('api/user/restore/',data);
		}
		function createUser(data)
		{
			return $http.post('api/user',data);
		}

		function getData()
		{
			 return $http({
                    method: 'GET',
                    url: 'http://homestead.app/scripts/data.json'
                });
		}
		return{
			getUsers  : getUsers,
			deleteUser: deleteUser,
			updateUser: updateUser,
			createUser: createUser,
			getData   : getData,
			restoreUser: restoreUser
		}

	});
})();