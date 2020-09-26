<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class ProductView{

    function showProducts($products) {
   
        $smarty = new Smarty();        
        $smarty->assign('products', $products);    
        $smarty->display('templates/showProducts.tpl');
    }
    
    function showError($msg){
        
        $smarty = new Smarty();        
        $smarty->assign('msg', $msg);    
        $smarty->display('templates/showError.tpl');                 
    }

    function showAddForm(){

        $smarty = new Smarty();        
        $smarty->display('templates/showAddForm.tpl');      
    }

    function showUpdateForm($product){

        $smarty = new Smarty();        
        $smarty->assign('product', $product);    
        $smarty->display('templates/showUpdateForm.tpl');    
    }
}