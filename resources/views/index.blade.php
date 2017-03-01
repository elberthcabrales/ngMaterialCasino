<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Casino Tory</title>

       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!-- Angular Material style sheet -->
      <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
      <link rel="stylesheet" href="/css/style.css">

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
<!-- css para paginacion -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
      <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-blue.min.css">
      <!--css tables -->
      <link rel="stylesheet" type="text/css" href="node_modules/md-data-table/dist/md-data-table-style.css">


    </head>
    <body ng-app="authApp"  ng-cloak>

    <!-- nav controller context -->
    <div ng-controller="NavController as nav" id="navContext">
    
      <md-toolbar class="md-hue-2" ng-if="nav.isAuthenticated()">
        <div class="md-toolbar-tools">
          <md-button class="md-icon-button" aria-label="Settings" ng-click="openSidebar()">
            <i class="material-icons non-up-margin">menu</i>
          </md-button>

          <h2 flex>Casino tory</h2>

          <md-button class="md-icon-button" ng-click="nav.logOut()">
            <i class="material-icons">exit_to_app</i>
          </md-button>
        </div>
      </md-toolbar>
  <!-- sidnav bar -->
      <md-sidenav class="md-sidenav-left md-whiteframe-z2" md-component-id="sidenaveLeft">
        <md-toolbar class="md-theme-light">
          <h1 class="md-toolbar-tools"> {{nav.email}} &nbsp <i class="material-icons">face</i></h1>
        </md-toolbar>
        <md-content layout-padding> 
         <md-list>
            <!-- <md-subheader class="md-no-sticky">Usuarios</md-subheader> -->
              <md-list-item class="md-2-line" ng-class="{active: nav.isActive('/users')}" href="#/users">
                <md-icon class="material-icon">list</md-icon>
                <div class="md-list-item-text" class="md-offset">
                  <h3> Administracion </h3>
                  <p> de usuarios </p>
                </div>
              </md-list-item>
              
              <!-- <md-subheader class="md-no-sticky">Registros</md-subheader> -->
              <md-list-item class="md-2-line" ng-class="{active: nav.isActive('/registros')}" href="#/registros">
                <md-icon class="material-icon">assessment</md-icon>
                <div class="md-list-item-text" class="md-offset">
                  <h3> Moviminentos </h3>
                  <p> en el casino </p>
                </div>
              </md-list-item>
              
              <!-- <md-subheader class="md-no-sticky">Fichas</md-subheader> -->
              <md-list-item class="md-2-line" ng-class="{active: nav.isActive('/fichas')}" href="#/fichas">
                <md-icon class="material-icon">tonality</md-icon>
                <div class="md-list-item-text" class="md-offset">
                  <h3>Fichas </h3>
                  <p>Adminstracion</p>
                </div>
              </md-list-item>
              
              <!-- <md-subheader class="md-no-sticky">Canjeos</md-subheader> -->
              <md-list-item class="md-2-line" ng-class="{active: nav.isActive('/canjeos')}" href="#/canjeos">
                <md-icon class="material-icon">shopping</md-icon>
                <div class="md-list-item-text" class="md-offset">
                  <h3> Canjeo </h3>
                  <p> a de fichas</p>
                </div>
              </md-list-item>

              <!-- <md-subheader class="md-no-sticky">Jugadores</md-subheader> -->
              <md-list-item class="md-2-line" ng-class="{active: nav.isActive('/jugadores')}" href="#/jugadores">
                <md-icon class="material-icon">group</md-icon>
                <div class="md-list-item-text" class="md-offset">
                  <h3> Administracion </h3>
                  <p> de jugadores</p>
                </div>
              </md-list-item>
        </md-list>
       </md-content>
      </md-sidenav>
      <!-- sidnav bar -->
    </div>
    <!-- nav controller context -->
      <!-- CONTENIDO CARGADO DESDE ANGULARJS -->
      <div ui-view></div>

<!-- [[csrf_token()]]  el coken solo aprece si esta el template como .blade.php-->


    </body>
 


      <!-- Angular Material requires Angular.js Libraries -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

    <!-- Angular Material Library -->
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
    <!-- dependencias anteriores -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="node_modules/angular-ui-router/build/angular-ui-router.js"></script>
    <script src="node_modules/satellizer/satellizer.js"></script>
    <script src="node_modules/angular-cookies/angular-cookies.min.js"></script>
    <script src="node_modules/angular-route/angular-route.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.16/angular-resource.min.js"></script>
<!-- librerias para grid administrativo -->
    <script src="http://angular-data-grid.github.io/dist/pagination.js"></script>
    <script src="http://angular-data-grid.github.io/dist/dataGrid.js"></script>
    <!-- undescore -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <!-- tables -->
    <script src="node_modules/md-data-table/dist/md-data-table.js"></script>
    <script src="node_modules/md-data-table/dist/md-data-table-templates.js"></script>

    <!-- Application Scripts -->
    <script src="scripts/app.js"></script>
    <script src="scripts/authController.js"></script>
    <script src="scripts/canjeosController.js"></script>
     <script src="scripts/registroController.js"></script>
    <script src="scripts/userController.js"></script>
    <script src="scripts/navController.js"></script>
    <script src="scripts/services.js"></script>
    <script src="scripts/factorys.js"></script>
    <script src="scripts/fichasController.js"></script>
    <!-- solo aprece el csrf_token si esta como index.blade.php
    <script>
      angular.module("authApp").constant("CSRF_TOKEN", '[[csrf_token()]]');
    </script> -->
</html>