<?php


// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
include_once 'app/controllers/db.controller.php';
//include_once 'app/controllers/category.controller.php';

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la accion Ej: suma/1/2 --> ['suma', 1, 2]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $controller = new dbController();
        $controller->showHome();
        break;
    case 'filtrar':
        $controller = new dbController();
        $id = $params[1];
        $controller->showByCat($id); //se refiere a la ID de la categoria
        break;
    case 'insertar':
        $controller = new dbController();
        $controller->addProduct();
        break;
    case 'eliminar':
        $controller = new dbController();
        $id = $params[1];
        $controller->deleteProduct($id);
        break;
    case 'update':
        $controller = new dbController();
        $id = $params[1];
        $controller->updateProduct($id);
        break;
    case 'editar':
        $controller = new dbController();
        $id = $params[1];
        $controller->RecordUpdateProduct();
        break;
    case 'verCategorias':
        $controller = new dbController();
        $controller->showAllcats();
        break;
    default:
       header("HTTP/1.0 404 Not Found");
       echo('404 Page not found');
       break;
}
?>