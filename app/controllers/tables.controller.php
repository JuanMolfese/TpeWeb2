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
        $this->catmodel = new CategoryModel();
        $category_list = $this->catmodel->getAllcategorys();  
        $this->view = new tablesView($category_list);
    }
    
    function showHome(){
        session_start();
        $product = $this->model->getAllOffer();
        $this->view->showProducts($product,'home','');
    }
    
    function showAllProd(){
        session_start();
        $product = $this->model->getAll();
        $this->view->showProducts($product,'allProd','');
    }

    function adminAllProd(){
        $this->checkLoggedIn();
        $product = $this->model->getAll();
        $this->view->showProducts($product,'allProd','');
    }
    
    function addProduct(){
        
        $this->checkLoggedIn();
        $allCats = $this->catmodel->getAllcategorys();
        $this->view->showAddForm($allCats);

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
        $this->checkLoggedIn(); 
        $this->view->showCategorys(/*$cats*/);
    }

    function showByCat($id){
        $thecat=$this->catmodel->getSelectedcat($id);
        $selected=$this->model->getAllSelectedCat($id);
        
        if(empty($selected)){
            $this->view->basepage();
            $this->view->showError("cat","No hay productos en esta categoria");
        }
        else    
        $this->view->showProducts($selected,'filtrar',$thecat);
        
    }

    function deleteProduct($id){
        $this->checkLoggedIn();
        $this->model->getSelectedProd($id);
        $success=$this->model->remove($id);
        if ($success){

            $this->view->basepage();
            $this->view->showConfirm("del","Se elimino el producto");}
        else{    
            $this->view->basepage();
            $this->view->showError("del","No se pudo eliminar el producto");
        }
       // header("Location: " . BASE_URL ."filtrar/->id_categoria");
    }

    function updateProduct($id){
        $this->checkLoggedIn();
    //  $getCats = new CategoryModel();
        $selected=$this->model->getSelectedProd($id);
    //  $allCats = $getCats->getAllcategorys();
        $this->view->showUpdateForm($selected/*, $allCats*/);
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
      //  ****$this->checkLoggedIn();****
           // $getCats = new CategoryModel();
            $selected=$this->catmodel->getAllSelectedCat($id);
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
    
    function deleteCategory($id){
        $this->checkLoggedIn();
        $catDeletedProd = $this->catmodel->getSelectedCat($id);
        $success=$this->catmodel->remove($id);
        if ($success){
            
            $this->view->basepage();
            $this->view->showConfirm("delcat","Se elimino la categoria");}
        else{    
            $this->view->basepage();
            $this->view->showError("delcat","La categoria contiene productos asociados");
        }
        //header("Location: " . 'verCategorias');
    }

    function addCategory(){
        session_start();
        $this->view->showAddCatForm();
        if (    (isset($_REQUEST['nombreCat']) && ($_REQUEST['nombreCat'] != null)) && 
                (isset($_REQUEST['descripcionCat']) && ($_REQUEST['descripcionCat'] != null))
            ) {                             
                $nombre = $_POST['nombreCat'];
                $descripcion = $_POST['descripcionCat'];
                      
                // inserto la tarea en la DB
                $success = $this->catmodel->insert($nombre, $descripcion);

                if($success)
                    $this->view->showConfirm("addcat","Se ingreso la nueva categoria");    
                else    
                    $this->view->showError("addcat","No se pudo ingresar la categoria");
            }    
    }
    function checkLoggedIn () {
        session_start ();
        if (!isset($_SESSION['ID_USER'])) {
            $this->view->showError("noLogin","No tiene permiso");
            die();
        }
    }

}
