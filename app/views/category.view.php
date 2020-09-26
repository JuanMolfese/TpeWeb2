<?php

require_once 'libs/smarty/libs/Smarty.class.php';


class CategoryView{

    function showCategorys($categorys) {
   
        $smarty = new Smarty();        
        $smarty->assign('category', $categorys);   
        $smarty->display('templates/showCategorys.tpl');
    }
}