<?php
require_once 'app/models/config.php';
require_once 'libs/Router.php';
require_once 'app/controllers/streamingcontrollers.php';
require_once 'app/controllers/pelicontrollers.php';
require_once 'app/controllers/userapicontroller.php';
require_once 'app/controllers/logincontrollers.php';
require_once 'app/helpers/api.helper.php';


$router = new Router();

             




            ///////////////PELICULAS///////////////
               
$router->addRoute('peliculas/servicio_fk/:SERVICIO_FK', 'GET', 'PeliController', 'getByServicioFk');//SIEMPRE ARRIBA DEL TODO

$router->addRoute('peliculas', 'GET', 'PeliController', 'getPeli');
$router->addRoute('peliculas', 'POST', 'PeliController', 'insertPeli');
$router->addRoute('peliculas/:ID', 'PUT', 'PeliController', 'updatePeli');
$router->addRoute('peliculas/:ID', 'GET', 'PeliController', 'getPeliById');
$router->addRoute('peliculas/:ID', 'DELETE', 'PeliController', 'deletePeli');
$router->addRoute('peliculas/orden/:ORDER',  'GET',    'PeliController', 'getByOrder');   






                ///////////////STREAMING///////////////
$router->addRoute('servicios', 'GET', 'StreamingController', 'getStreaming');
$router->addRoute('servicios', 'POST', 'StreamingController', 'insertServicio');
$router->addRoute('servicios/:ID', 'PUT', 'StreamingController', 'updatePeli');
$router->addRoute('servicios/:ID', 'GET', 'StreamingController', 'getStreamingById');

$router->addRoute('servicios/:ID', 'DELETE', 'StreamingController', 'deleteStream');               



//endpoint localhost/api/api/auth/token
$router->addRoute('auth/token', 'GET', 'UserApiController', 'getToken'); 

$action = 'peliculas';
if (!empty( $_GET['resource'])) {
    $action = $_GET['resource'];
}
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);