<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Angular-Laravel Authentication</title>
        <!--<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">-->
         <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!-- Compiled and minified JavaScript -->
       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
       <!-- <script src="https://code.angularjs.org/1.3.9/angular-cookies.min.js"></script>-->

    </head>
    <body ng-app="authApp">
     <div ng-controller="NavController as nav">
   <!--       <nav ng-if="nav.isAuthenticated()"> 
            <div class="nav-wrapper">
              
              <a href="#" class="brand-logo"></a>
              <a href="#">Hola : {{nav.email}}</a>

              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li ng-class="{active: nav.isActive('/registros')}"><a href="#/registros">Registros</a></li>
                <li ng-class="{active: nav.isActive('/canjeos')}"><a href="#/canjeos">canjeos</a></li>
                <li ng-class="{active: nav.isActive('/link')}"><a href="collapsible.html">fichas</a></li>
                <li ng-class="{active: nav.isActive('/users')}"><a href="#/users">usuarios</a></li>
                <li ng-class="{active: nav.isActive('/link')}"><a href="collapsible.html">Jugadores</a></li>
                <li ng-click="nav.logOut()"><a href="#">Salir</a></li>
              </ul>
            </div>
          </nav>-->
          <nav  ng-if="nav.isAuthenticated()">
            <div class="nav-wrapper">
          
              <a href="#">Hola : {{nav.email}}</a>
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                 <li ng-class="{active: nav.isActive('/registros')}"><a href="#/registros">Registros</a></li>
                <li ng-class="{active: nav.isActive('/canjeos')}"><a href="#/canjeos">canjeos</a></li>
                <li ng-class="{active: nav.isActive('/link')}"><a href="collapsible.html">fichas</a></li>
                <li ng-class="{active: nav.isActive('/users')}"><a href="#/users">usuarios</a></li>
                <li ng-class="{active: nav.isActive('/link')}"><a href="collapsible.html">Jugadores</a></li>
                <li ng-click="nav.logOut()"><a href="#">Salir</a></li>
              </ul>
              <ul class="side-nav" id="mobile-demo">
                 <li ng-class="{active: nav.isActive('/registros')}"><a href="#/registros">Registros</a></li>
                <li ng-class="{active: nav.isActive('/canjeos')}"><a href="#/canjeos">canjeos</a></li>
                <li ng-class="{active: nav.isActive('/link')}"><a href="collapsible.html">fichas</a></li>
                <li ng-class="{active: nav.isActive('/users')}"><a href="#/users">usuarios</a></li>
                <li ng-class="{active: nav.isActive('/link')}"><a href="collapsible.html">Jugadores</a></li>
                <li ng-click="nav.logOut()"><a href="#">Salir</a></li>
              </ul>
            </div>
          </nav>
          
      </div>
 <!--  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>-->
        	<div ui-view></div>
   
     
    </body>
 
    <!-- Application Dependencies -->
    <!--<script src="node_modules/jquery/dist/jquery.min.js"></script>-->
     <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <script src="node_modules/angular/angular.js"></script>
    <script src="node_modules/angular-ui-router/build/angular-ui-router.js"></script>
    <script src="node_modules/satellizer/satellizer.js"></script>
    <script src="node_modules/angular-cookies/angular-cookies.min.js"></script>
    <script src="node_modules/angular-route/angular-route.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.16/angular-resource.min.js"></script>

    <!-- Application Scripts -->
    <script src="scripts/app.js"></script>
    <script src="scripts/authController.js"></script>
     <script src="scripts/registroController.js"></script>
    <script src="scripts/userController.js"></script>
    <script src="scripts/navController.js"></script>
    <script src="scripts/services.js"></script>
    <script src="scripts/factorys.js"></script>
   
    <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
      <script type="text/javascript">
      (function($){
        $(function(){
        $('.button-collapse').sideNav();
        }); // end of document ready
      })(jQuery); // end of jQuery name space
  
    </script>
     
</html>