<?php
require_once 'libs/Router.php';
require_once 'app/api/api-comments.controller.php';

// creo el router
$router = new Router();

// armo la tabla de ruteo
$router->addRoute('comment', 'GET', 'ApiComments', 'getAll');
$router->addRoute('comment/:ID', 'GET', 'ApiComments', 'get');
$router->addRoute('comment/:ID', 'DELETE', 'ApiComments', 'delete');


// rutea
$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);