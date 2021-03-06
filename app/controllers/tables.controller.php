<?php
include_once 'app/models/product.model.php';
include_once 'app/models/category.model.php';
include_once 'app/models/comment.model.php';
include_once 'app/views/tables.view.php';
include_once 'app/helpers/auth.helper.php';



class tablesController {
    
    private $model;
    private $view;
    private $catmodel;
    
    private $authHelper;
    
    
    function __construct() {
        
        $this->model = new productModel();
        $this->catmodel = new CategoryModel();
        $this->commentmodel = new CommentsModel();
        $category_list = $this->catmodel->getAllcategorys();  
        $this->view = new tablesView($category_list);
        $this->authHelper = new AuthHelper();
    }
    
    
    function showHome($start,$end){//muestra en el home todas las ofertas
        
        $product = $this->model->getAllOffer($start,$end);
        if(empty($product)){
            $this->view->basepage();
            $this->view->showError("cat","No hay más productos");
        }
        else{    
           
            $this->view->showProducts($product,'home','',$start,$end);
        }
    }
    
   
    function showAllProd($start,$end){//muestra listado completo de todos los productos

        $product = $this->model->getAll($start,$end);
        if(empty($product)){
            $this->view->basepage();
            $this->view->showError("cat","No hay más productos");
        }
        else{    
        $this->view->showProducts($product,'allProd','',$start,$end);
        }
    }
    
 
    //muestra todos los productos al administrador, para trabajar sobre listado
    function adminAllProd($start,$end){
    
        $typeuser = $this->authHelper->checkLoggedIn();
        if($typeuser[0]){
            $product = $this->model->getAll($start,$end);
            if(empty($product)){
                $this->view->basepage();
                $this->view->showError("cat","No hay más productos");
            }
            else{    
            $this->view->showProducts($product,'adminProd','',$start,$end);
            }
        }
        else{
            header("Location: " . BASE_URL . "home");
        }
    }

  
    //verifica login trae tabla de categorias, y muestra formulario para ingreso 
    //de campos y alta de producto
    function addProduct(){
        
        $typeuser = $this->authHelper->checkLoggedIn();
        if($typeuser[0]){
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
                    
                    
                if($_FILES['imagen_prod']['type'] == "image/jpg" || $_FILES['imagen_prod']['type'] == "image/jpeg" || $_FILES['imagen_prod']['type'] == "image/png"){
                    
                    $image = $this->uniqueSaveName($_FILES['imagen_prod']['name'],$_FILES['imagen_prod']['tmp_name']);

                    $success = $this->model->insert($nombre, $descripcion, $precio, $oferta, $categoria, $image);

                    if($success){
                        $this->view->showConfirm("add","Se ingreso el producto");   
                    } 
                    else {   
                        $this->view->showError("add","No se pudo ingresar el producto");
                    }
                }else{

                    $success = $this->model->insert($nombre, $descripcion, $precio, $oferta, $categoria);

                    if($success){
                        $this->view->showConfirm("add","Se ingreso el producto");   
                    } 
                    else {   
                        $this->view->showError("add","No se pudo ingresar el producto");
                    }
                }
            }    
        }
        else{
            header("Location: " . BASE_URL . "home");
        }

    }

  
    function uniqueSaveName($imgName, $tempName) {
        
        $filePath = "images/" . uniqid("", true) . "." 
            . strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

        move_uploaded_file($tempName, $filePath);

        return $filePath;
    }

  
    //verifica login, y muestra el listado de todas las categorias
    function showAllcats () {
        
        $typeuser = $this->authHelper->checkLoggedIn();
        if($typeuser[0]){
             $this->view->showCategorys();
        }
        else{
            header("Location: " . BASE_URL . "home");
        }
    }

  
    //genera listado segun categoria especificada
    function showByCat($id,$start,$end){

        $thecat=$this->catmodel->getSelectedcat($id);
        $selected=$this->model->getAllSelectedCat($id,$start,$end);
        
        if(empty($selected)){
            $this->view->basepage();
            $this->view->showError("cat","No hay productos en esta categoria");
        }
        else{    
            $this->view->showProducts($selected,'filtrar',$thecat,$start,$end);
        }
    }

   
    //verifica login, y borra producto segun id indicado
    function deleteProduct($id){

        $typeuser = $this->authHelper->checkLoggedIn();
        if($typeuser[0]){
            $success=$this->model->remove($id);
            if ($success){

                $this->view->basepage();
                $this->view->showConfirm("del","Se elimino el producto");}
            
            else{    
                $this->view->basepage();
                $this->view->showError("del","No se pudo eliminar el producto");
            }
        }
        else{    
            header("Location: " . BASE_URL . "home");
        }
    }


    function deleteImg($id){
       

        $typeuser = $this->authHelper->checkLoggedIn();
        if($typeuser[0]){
            $product=$this->model->getSelectedProd($id);
            $success=$this->model->removeImg($product->id, $product->nombre, $product->descripcion, $product->precio, $product->oferta, $product->id_categoria, $product->imagen);
            if ($success){

                $this->view->basepage();
                $this->view->showConfirm("del","Se elimino la imagen");}
            
            else{    
                $this->view->basepage();
                $this->view->showError("del","No se pudo eliminar la imagen");
            }
        }
        else{    
            header("Location: " . BASE_URL . "home");
        }

    }

   
    //verifica login, y carga producto segun id en formulario para edicion
    function updateProduct($id){

        $typeuser = $this->authHelper->checkLoggedIn();
        if($typeuser[0]){
            $selected=$this->model->getSelectedProd($id);
            $this->view->showUpdateForm($selected);
        }else{
            header("Location: " . BASE_URL . "home");
        }
    }

   
    //verifica seteo en los inputs, e inserta contenido en la base de datos
    function RecordUpdateProduct(){
        
        if ((isset($_REQUEST['nombre']) && ($_REQUEST['nombre'] != null)) && 
            (isset($_REQUEST['descripcion']) && ($_REQUEST['descripcion'] != null)) && 
            (isset($_REQUEST['precio']) && ($_REQUEST['precio'] != null)) &&
            (isset($_REQUEST['oferta']) && ($_REQUEST['oferta'] != null)) &&
            (isset($_REQUEST['categoria']) && ($_REQUEST['categoria'] != null))) {                     
            $id = $_POST['idProducto'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $oferta = $_POST['oferta'];
            $categoria = $_POST['categoria'];
            
            if($_FILES['imagen_prod']['type'] == "image/jpg" || $_FILES['imagen_prod']['type'] == "image/jpeg" || $_FILES['imagen_prod']['type'] == "image/png"){
                
                $image = $this->uniqueSaveName($_FILES['imagen_prod']['name'],$_FILES['imagen_prod']['tmp_name']);
                
                $this->model->RecordUpdateProduct($id, $nombre, $descripcion, $precio, $oferta, $categoria, $image);
                header("Location: " . 'filtrar/'.$categoria);


            }else{
                $this->model->RecordUpdateProduct($id, $nombre, $descripcion, $precio, $oferta, $categoria);
                header("Location: " . 'filtrar/'.$categoria);
            }
        }
    }

   
    //asigna a formulario detalle del producto seleccionado
    function showProductDetail($id){
           
        $selected=$this->model->getSelectedProd($id);
        $this->view->showDetail($selected);
    }

   
    //carga en formulario categoria a editar
    function updateCat($id){
     
        $selected=$this->catmodel->getAllSelectedCat($id);
        $this->view->showUpdateCatForm($selected);
    }      
    
    //inserta en base de datos categoria editada
    function RecordUpdateCat(){
        
        if ((isset($_REQUEST['nombreCat']) && ($_REQUEST['nombreCat'] != null)) && 
            (isset($_REQUEST['descripcionCat']) && ($_REQUEST['descripcionCat'] != null))) {                     
            $id = $_POST['idCategoria'];
            $nombre = $_POST['nombreCat'];
            $descripcion = $_POST['descripcionCat'];
            $this->catmodel->RecordUpdateCat($id, $nombre, $descripcion);
            header("Location: " . 'verCategorias');
        }
    }
    
   
    //previo cheque de login borra categoria indicada por id
    function deleteCategory($id){

        $typeuser = $this->authHelper->checkLoggedIn();
        if($typeuser[0]){
            $this->catmodel->getSelectedCat($id);
            $success=$this->catmodel->remove($id);
        
            if ($success){
                $this->view->basepage();
                $this->view->showConfirm("delcat","Se elimino la categoria");
            }
            else{    
                $this->view->basepage();
                $this->view->showError("delcat","La categoria contiene productos asociados");
            }
        }
        else{
            header("Location: " . BASE_URL . "home");
        }
        
    }

   
    //inserta categoria cargada en formulario
    function addCategory(){

        $typeuser = $this->authHelper->checkLoggedIn();
        if($typeuser[0]){
            $this->view->showAddCatForm();
            if ((isset($_REQUEST['nombreCat']) && ($_REQUEST['nombreCat'] != null)) && 
                (isset($_REQUEST['descripcionCat']) && ($_REQUEST['descripcionCat'] != null))) {                             
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
        else{
            header("Location: " . BASE_URL . "home");
        }
    }
    
}