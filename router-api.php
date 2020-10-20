<?php
require_once 'libs/Router.php';
require_once 'app/api/api-comments.controller.php';

// creo el router
$router = new Router();

// armo la tabla de ruteo
$router->addRoute('tareas', 'GET', 'ApiComments', 'getAll');
$router->addRoute('tareas/:ID', 'GET', 'ApiComments', 'get');
$router->addRoute('tareas/:ID', 'DELETE', 'ApiComments', 'delete');


// rutea
$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);