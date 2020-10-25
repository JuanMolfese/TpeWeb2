<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class authView{

    private $smarty;
 
    //Genera constructor de la clase: instancia la var smarty para que sea
    //usada en las func de la clase y recibe la lista de todas las categorias de la db
    function __construct($category_list){

        $this->smarty = new Smarty();
        $this->smarty->assign('categorys', $category_list);
        
    }

    //Muestra pantalla de login
    function showLogin() {

        $this->smarty->display('templates/showLogin.tpl');
    }
    
    //Muestra cartel de error de login
    function showErrorLogin($origin = null , $msg){

        $this->smarty->assign('origin', $origin);
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/showErrorLogin.tpl');
    }
    
    //Muestra cartel de confirmacion de login
    function showConfirmLogin($origin = null, $msg){
        
        $this->smarty->assign('origin', $origin);            
        $this->smarty->assign('msg', $msg);    
        $this->smarty->display('templates/showConfirmLogin.tpl');
    }

    function showRegisterform(){

        $this->smarty->display('templates/showRegisterform.tpl');
    }

    function showList ($users){
        $this->smarty->assign('users', $users);   
        $this->smarty->display('templates/showUserslist.tpl');
    }
    
    function showUpdateUserForm($user){
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/showUpdateUserForm.tpl');
    }
}