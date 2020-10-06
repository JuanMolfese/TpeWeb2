<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class authView{

    private $smarty;
 
    function __construct($category_list){
        $this->smarty = new Smarty();
        $this->smarty->assign('categorys', $category_list);
    }

  
    function showLogin() {

        $this->smarty->display('templates/showLogin.tpl');
    }
    
    function showErrorLogin($origin = null , $msg){

        $this->smarty->assign('origin', $origin);
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/showErrorLogin.tpl');
    }
    
    function showConfirmLogin($origin = null, $msg){
        
        $this->smarty->assign('origin', $origin);            
        $this->smarty->assign('msg', $msg);    
        $this->smarty->display('templates/showConfirmLogin.tpl');
    }
}