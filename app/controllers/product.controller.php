<?php
include_once 'app/models/product.model.php';
include_once 'app/views/product.view.php';


class ProductController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new ProductModel();
        $this->view = new ProductView();

    }

    function showHome(){
        
        $product = $this->model->getAll();
        $this->view->showProducts($product);

    }

    function showByCat($id){
       
    }

    function addProduct(){
       
        $this->view->showAddForm();

        if (    (isset($_REQUEST['nombre']) && ($_REQUEST['nombre'] != null)) && 
                (isset($_REQUEST['descripcion']) && ($_REQUEST['descripcion'] != null)) && 
                (isset($_REQUEST['precio']) && ($_REQUEST['precio'] != null)) &&
                (isset($_REQUEST['oferta']) && ($_REQUEST['oferta'] != null)) &&
                (isset($_REQUEST['categoria']) && ($_REQUEST['categoria'] != null))
            ) {                     
        
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $oferta = $_POST['oferta'];
                $categoria = $_POST['categoria'];
        
                // inserto la tarea en la DB
                $this->model->insert($nombre, $descripcion, $precio, $oferta, $categoria);
        
        
        }
            // redirigimos al listado
            //header("Location: " . BASE_URL); 
    }

    function deleteProduct($id){
       $this->model->remove($id);
       header("Location: " . BASE_URL); 
    }

    function updateProduct($id){
       
        //UPDATE `producto` SET `id`=[value-1],`nombre`=[value-2],`descripcion`=[value-3],`precio`=[value-4],`oferta`=[value-5],`id_categoria`=[value-6] WHERE 1
    }


    function cristianoQuerido($msg){
        $this->view->showError($msg);
    }


}