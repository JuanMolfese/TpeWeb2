<?php
include_once 'app/models/product.model.php';
include_once 'app/views/productos.view.php';


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
        
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $oferta = $_POST['oferta'];
        $categoria = $_POST['categoria'];

        // verifico campos obligatorios
        if (empty($nombre) || empty($precio) || empty($categoria)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        // inserto la tarea en la DB
        $id = $this->model->insert($nombre, $descripcion, $precio, $oferta, $categoria);

        // redirigimos al listado
        header("Location: " . BASE_URL); 
    }

    function deleteProduct($id){
        $this->model->remove($id);
        header("Location: " . BASE_URL); 
    }

    function updateProduct($id){
        //UPDATE `producto` SET `id`=[value-1],`nombre`=[value-2],`descripcion`=[value-3],`precio`=[value-4],`oferta`=[value-5],`id_categoria`=[value-6] WHERE 1
    }





}