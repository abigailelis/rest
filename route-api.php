<?php 
/*--Requiero el archivo router.php--*/
require_once './libs/Router.php';
require_once './app/controllers/objetosApiController.php';

/*--Instancio un nuevo router--*/
$router = new Router();

/*--Defino la tabla de ruteo--*/
//$router->addRoute('tareas', 'GET', 'ApiTaskController', 'obtenerTareas');

$router->addRoute('objetos', 'GET', 'objetosApiController', 'obtenerObjetos');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);