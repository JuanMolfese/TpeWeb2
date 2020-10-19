<?php
require_once 'libs/Router.php';
require_once 'app/api/api-product.comments.controller.php';

// creo el router
$router = new Router();

// armo la tabla de ruteo
$router->addRoute('tareas', 'GET', 'ApiProductComments', 'getAll');
$router->addRoute('tareas/:ID', 'GET', 'ApiProductComments', 'get');
$router->addRoute('tareas/:ID', 'DELETE', 'ApiProductComments', 'delete');


// rutea
$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);
