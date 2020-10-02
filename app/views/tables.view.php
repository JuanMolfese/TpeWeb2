<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class dbView{

    function showProducts($products) {

        $smarty = new Smarty();
        $smarty->assign('products', $products);
        $smarty->display('templates/showProducts.tpl');
    }
    
    function showError($origin, $msg){

        $smarty = new Smarty();
        $smarty->assign('origin', $origin);
        $smarty->assign('msg', $msg);
        $smarty->display('templates/showError.tpl');
    }
    
    function showConfirm($origin, $msg){
        
        $smarty = new Smarty();
        $smarty->assign('origin', $origin);            
        $smarty->assign('msg', $msg);    
        $smarty->display('templates/showConfirm.tpl');                 
    }
    
    function basepage(){
        
        $smarty = new Smarty();        
        $smarty->display('templates/basepage.tpl');                 
    }

    function showAddForm(){

        $smarty = new Smarty();        
        $smarty->display('templates/showAddForm.tpl');      
    }

    function showUpdateForm($product, $categorys){

        $smarty = new Smarty();        
        $smarty->assign('product', $product);
        $smarty->assign('categorys', $categorys);
        $smarty->display('templates/showUpdateForm.tpl');    
    }
    
    function showDetail($product) {

        $smarty = new Smarty();
        $smarty->assign('product', $product);
        $smarty->display('templates/showDetail.tpl');
    }
    function showCategorys($categorys) {
    
        $smarty = new Smarty();        
        $smarty->assign('category', $categorys);   
        $smarty->display('templates/showCategorys.tpl');
    }
}


