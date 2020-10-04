<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class authView{

    function showLogin() {

        $smarty = new Smarty();
        $smarty->display('templates/showLogin.tpl');
    }

    function showError($origin, $msg){

        $smarty = new Smarty();
        $smarty->assign('origin', $origin);
        $smarty->assign('msg', $msg);
        $smarty->display('templates/showErrorLogin.tpl');
    }
    
    function showConfirm($origin, $msg){
        
        $smarty = new Smarty();
        $smarty->assign('origin', $origin);            
        $smarty->assign('msg', $msg);    
        $smarty->display('templates/showConfirmLogin.tpl');
    }
}