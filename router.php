<?php


// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
include_once 'app/controllers/tables.controller.php';
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
        $controller = new tablescontroller();
        $controller->showHome();
        break;
    case 'allProd':
        $controller = new tablesController();
        $controller->showAllProd();
        break;
    case 'filtrar':
        $controller = new tablesController();
        $id = $params[1];
        $controller->showByCat($id); //se refiere a la ID de la categoria
        break;
    case 'insertar':
        $controller = new tablesController();
        $controller->addProduct();
        break;
    case 'details':
        $controller = new tablesController();
        $id = $params[1];
        $controller->showProductDetail($id);
        break;
    case 'eliminar':
        $controller = new tablesController();
        $id = $params[1];
        $controller->deleteProduct($id);
        break;
    case 'update':
        $controller = new tablesController();
        $id = $params[1];
        $controller->updateProduct($id);
        break;
    case 'editar':
        $controller = new tablesController();
        $id = $params[1];
        $controller->RecordUpdateProduct();
        break;
    case 'verCategorias':
        $controller = new tablesController();
        $controller->showAllcats();
        break;
    case 'login':
        $controller = new authController(); // <= ver con Cris si Crear nuevo controller
        $controller->loginUser(); // <= en funcion a lo que decidamos es donde se crearia esta fn
        break;
    default:
       header("HTTP/1.0 404 Not Found");
       echo('404 Page not found');
       break;
}
?>