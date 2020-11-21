<?php


// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
include_once 'app/controllers/tables.controller.php';
include_once 'app/controllers/auth.controller.php';

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
    case 'login':
        $controller = new authController(); 
        $controller->loginUser(); 
        break;
    case 'logout':
        $controller = new authController(); 
        $controller->logout(); 
        break;
    case 'verifyUser':
        $controller = new authController(); 
        $controller->verifyUser(); 
        break;
    case 'home':
        $controller = new tablesController();
        if (count($params)<=1)
          $start=0;
        else {
         $start=$params[1];
        }
        $controller->showHome($start);
        break;
    case 'allProd':
        $controller = new tablesController();
        if (count($params)<=1)
        $start=0;
      else {
       $start=$params[1];
      }
         $controller->showAllProd($start);
        break;
    case 'adminProd':
        $controller = new tablesController();
        if (count($params)<=1)
        $start=0;
      else {
       $start=$params[1];
      }
        $controller->adminAllProd($start);
        break;
    case 'filtrar':
        $controller = new tablesController();
        $id = $params[1];
        if (count($params)<=2)
        $start=0;
      else {
       $start=$params[2];
      }
        $controller->showByCat($id,$start); //se refiere a la ID de la categoria
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
     //   $id = $params[1];
        $controller->RecordUpdateProduct();
        break;
    case 'verCategorias':
        $controller = new tablesController();
        $controller->showAllcats();
        break;
    case 'updateCat':
        $controller = new tablesController();
        $id = $params[1];
        $controller->updateCat($id);
        break;
    case 'editarCat':
        $controller = new tablesController();
     //   $id = $params[1];
        $controller->RecordupdateCat();
        break;
    case 'eliminarCategoria':
        $controller = new tablesController();
        $id = $params[1];
        $controller->deleteCategory($id);
        break;
    case 'insertarCategoria':
        $controller = new tablesController();
        $controller->addCategory();
        break;
    case 'register':
        $controller = new AuthController();
        $controller->addUser();
        break;
    case 'verUsuarios':
        $controller = new AuthController();
        $controller->showUsers();
        break;
    case 'deleteUser':
        $controller = new AuthController();
        $id = $params[1];
        $controller->deleteUser($id);
        break;
    case 'updateUser':
        $controller = new AuthController();
        $id = $params[1];
        $controller->updateUser($id);
        break;
    case 'recordUser':
        $controller = new AuthController();
        $controller->insertUser();
        break;   
    case 'addComment':
        $controller = new tablesController();
        $id = $params[1];
        $controller->insertComment($id);
        break;  
    case 'recordComment':
        $controller = new tablesController();
        $id = $params[1];
        $controller->recordComment($id);
        break;
    case 'showComments':
        $controller = new tablesController();
        $id = $params[1];
        $controller->listComments($id);
        break;
    case 'deleteComment':
        $controller = new tablesController();
        $id = $params[1];
        $id_prod = $params[2];
        $controller->deleteComment($id, $id_prod);
        break;
    default:
       header("HTTP/1.0 404 Not Found");
       echo('404 Page not found');
       break;
}
?>