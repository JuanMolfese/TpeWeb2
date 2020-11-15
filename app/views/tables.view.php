<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class tablesView{

    private $smarty;

    //Genera constructor de la clase: instancia la var smarty para que sea
    //usada en las func de la clase y recibe la lista de todas las categorias de la db
    function __construct($category_list){
        $this->smarty = new Smarty();
        $this->smarty->assign('categorys', $category_list);
       
    }

    //Muestra lista de productos, recibe: lista de prod, info de donde es llamado y su categoria
    function showProducts($products,$ruta,$cat=null) {

        $this->smarty->assign('products', $products);
        $this->smarty->assign('ruta', $ruta);
        $this->smarty ->assign('cat', $cat);
        $this->smarty->display('templates/showProducts.tpl');
    }
    
     //Muestra cartel de error, recibe: origen del error y mensaje
    function showError($origin, $msg){

        $this->smarty->assign('origin', $origin);
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/showError.tpl');
    }
    
    //Muestra cartel de confirmacion, recibe: origen de la confirmacion y mensaje
    function showConfirm($origin, $msg){
        
        $this->smarty->assign('origin', $origin);            
        $this->smarty->assign('msg', $msg);    
        $this->smarty->display('templates/showConfirm.tpl');                 
    }
    
    //Muestra marco de los modal
    function basepage(){
        
        $this->smarty->display('templates/basepage.tpl');                 
    }

    //Muestra formulario para cargar un nuevo producto
    function showAddForm(){
          
        $this->smarty->display('templates/showAddForm.tpl');      
    }

    //Muestra formulario para actualizar un nuevo producto
    function showUpdateForm($product){

        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/showUpdateForm.tpl');    
    }
    
    //Muestra detalle de un producto sin posibilidad de edicion
    function showDetail($product) {

        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/showDetail.tpl');
    }
    
    //Muestra lista de las catogrias disponibles
    function showCategorys() {
    
        $this->smarty->display('templates/showCategorys.tpl');
    }

    //Muestra formulario para actualizar una categoria
    function showUpdateCatform($categorySelect){

        $this->smarty->assign('category', $categorySelect);
        $this->smarty->display('templates/showUpdateCatform.tpl');    
    }

    //Muestra formulario para agregar una nueva categoria
    function showAddcatForm(){
        $this->smarty->display('templates/showAddcatForm.tpl');      
    }

     //Muestra formulario para agregar un comentario
     function showaddComment($product_id){
        $this->smarty->assign('product_id', $product_id);
        $this->smarty->display('templates/showAddCommentForm.tpl');      
    }

    //Muestra lista de comentarios
    function showComments($product) {       
        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/showComments.tpl');
    }
}