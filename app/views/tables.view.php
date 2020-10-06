<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class tablesView{

    private $smarty;

    function __construct($category_list){
        $this->smarty = new Smarty();
        $this->smarty->assign('categorys', $category_list);
    }

    function showProducts($products,$ruta,$cat) {

        $this->smarty->assign('products', $products);
        $this->smarty->assign('ruta', $ruta);
        $this->smarty ->assign('cat', $cat);
        $this->smarty->display('templates/showProducts.tpl');
    }
    
    function showError($origin, $msg){

        $this->smarty->assign('origin', $origin);
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/showError.tpl');
    }
    
    function showConfirm($origin, $msg){
        
        $this->smarty->assign('origin', $origin);            
        $this->smarty->assign('msg', $msg);    
        $this->smarty->display('templates/showConfirm.tpl');                 
    }
    
    function basepage(){
        
        $this->smarty->display('templates/basepage.tpl');                 
    }

    function showAddForm(/*$categorys*/){
      //  $this->smarty->assign('categorys', $categorys);      
        $this->smarty->display('templates/showAddForm.tpl');      
    }

    function showUpdateForm($product/*, $categorys*/){

        $this->smarty->assign('product', $product);
     //   $this->smarty->assign('categorys', $categorys);
        $this->smarty->display('templates/showUpdateForm.tpl');    
    }
    
    function showDetail($product) {

        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/showDetail.tpl');
    }
    function showCategorys(/*$categorys*/) {
    
     //   $this->smarty->assign('category', $categorys);   
        $this->smarty->display('templates/showCategorys.tpl');
    }
    function showUpdateCatform($categorySelect){

        $this->smarty->assign('category', $categorySelect);
        $this->smarty->display('templates/showUpdateCatform.tpl');    
    }
    function showAddcatForm(){

        $this->smarty->display('templates/showAddcatForm.tpl');      
    }
}


