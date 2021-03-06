(function() {

	'use strict';
//  se agregaron 'dataGrid', 'pagination' para la paginacion
	angular
		.module('authApp', ['ngMaterial','ui.router',
			'satellizer','ngCookies','ngRoute','MiPrimerService','md.data.table'])
		.config(function($stateProvider, $urlRouterProvider, $authProvider,$mdThemingProvider) {
			// configuracion del tema
			$mdThemingProvider.theme('dark-purple').primaryPalette('teal').accentPalette('indigo');
			// Satellizer configuration that specifies which API
			// route the JWT should be retrieved from
			$authProvider.loginUrl = '/api/authenticate';

			// Redirect to the auth state if any other states
			// are requested other than users
			$urlRouterProvider.otherwise('/auth');
			
			$stateProvider
				.state('auth', {
					url: '/auth',
					templateUrl: '../views/authView.html',
					controller: 'AuthController as auth'
				}).state('users', {
					url: '/users',
					templateUrl: '../views/userView.html',
					controller: 'UserController as user'
				})
				.state('canjeos', {
					url: '/canjeos',
					templateUrl: '../views/canjeosView.html',
					controller: 'CanjeosController as canjeos'
				}).state('table', {
					url: '/table',
					templateUrl: '../views/tableView.html',
					controller: 'TableController as table'
				}).state('registros', {
					url: '/registros',
					templateUrl: '../views/registroView.html',
					controller: 'RegistroController as regc'
				});
		});
})();