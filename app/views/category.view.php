<?php

require_once 'libs/smarty/libs/Smarty.class.php';


class CategoryView{

    function showCategorys($products) {
   
        $smarty = new Smarty();        
        $smarty->assign('products', $products);    
        $smarty->display('templates/showProducts.tpl');
    }