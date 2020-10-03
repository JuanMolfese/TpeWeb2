<?php
include_once 'app/models/product.model.php';
include_once 'app/models/category.model.php';
include_once 'app/views/tables.view.php';



class tablesController {
    
    private $model;
    private $view;
    private $catmodel;
    
    
    function __construct() {
        
        $this->model = new productModel();
        $this->view = new tablesView();
        $this->catmodel = new CategoryModel();
    }

    function showHome(){
        
        $product = $this->model->getAllOffer();
        $this->view->showProducts($product);
    }

    function showAllProd(){
        
        $product = $this->model->getAll();
        $this->view->showProducts($product);
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
                $success = $this->model->insert($nombre, $descripcion, $precio, $oferta, $categoria);

                if($success)
                    $this->view->showConfirm("add","Se ingreso el producto");    
                else    
                    $this->view->showError("add","No se pudo ingresar el producto");
            }    
    }

    function showAllcats () {
        $cats = $this->catmodel->getAllcategorys();
        $this->view->showCategorys($cats);
    }
    function showByCat($id){
        
        $selected=$this->model->getSelectedCat($id);
        if(empty($selected)){
            $this->view->basepage();
            $this->view->showError("cat","No hay productos en esta categoria");
        }
        else    
        $this->view->showProducts($selected);
    }
        
    function deleteProduct($id){
        
        $catDeletedProd = $this->model->getSelectedProd($id);
        $success=$this->model->remove($id);
        if ($success){
            $this->view->basepage();
            $this->view->showConfirm("del","Se elimino el producto");}
        else{    
            $this->view->basepage();
            $this->view->showError("del","No se pudo eliminar el producto");
        }
       // header("Location: " . BASE_URL ."filtrar/$catDeletedProd->id_categoria");
    }

    function updateProduct($id){
        $getCats = new CategoryModel();
        $selected=$this->model->getSelectedProd($id);
        $allCats = $getCats->getAllcategorys();
        $this->view->showUpdateForm($selected, $allCats);
    }

    function RecordUpdateProduct(){
        
        if (    (isset($_REQUEST['nombre']) && ($_REQUEST['nombre'] != null)) && 
                (isset($_REQUEST['descripcion']) && ($_REQUEST['descripcion'] != null)) && 
                (isset($_REQUEST['precio']) && ($_REQUEST['precio'] != null)) &&
                (isset($_REQUEST['oferta']) && ($_REQUEST['oferta'] != null)) &&
                (isset($_REQUEST['categoria']) && ($_REQUEST['categoria'] != null))
            ) {                     
                $id = $_POST['idProducto'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $oferta = $_POST['oferta'];
                $categoria = $_POST['categoria'];
                
                $this->model->RecordUpdateProduct($id, $nombre, $descripcion, $precio, $oferta, $categoria);
                header("Location: " . 'filtrar/'.$categoria);
            }
    }

    function showProductDetail($id){
           
        $selected=$this->model->getSelectedProd($id);
        $this->view->showDetail($selected);
    }
    function updateCat($id){
        
            $getCats = new CategoryModel();
            $selected=$this->catmodel->getSelectedCat($id);
          //  $allCats = $getCats->getAllcategorys();
            $this->view->showUpdateCatForm($selected);
        
    }      
    
    function RecordUpdateCat(){
        
        if (    (isset($_REQUEST['nombreCat']) && ($_REQUEST['nombreCat'] != null)) && 
                (isset($_REQUEST['descripcionCat']) && ($_REQUEST['descripcionCat'] != null))
            ) {                     
                $id = $_POST['idCategoria'];
                $nombre = $_POST['nombreCat'];
                $descripcion = $_POST['descripcionCat'];
              
                
                $this->catmodel->RecordUpdateCat($id, $nombre, $descripcion);
                header("Location: " . 'verCategorias');
            }
    }
}
