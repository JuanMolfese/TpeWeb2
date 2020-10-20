<?php

include_once 'app/views/auth.view.php';
include_once 'app/models/user.model.php';
include_once 'app/helpers/auth.helper.php';

class authController{

    private $view;
    private $model;
    private $catmodel;
    private $authHelper;

    function __construct(){
       
        $this->catmodel = new CategoryModel();
        $category_list = $this->catmodel->getAllcategorys();  //se instancia al modelo de tables.
        $this->view = new authView($category_list);
        $this->model = new userModel();
        $this->authHelper = new AuthHelper();
    }

    //Muestra pantalla de login
    function loginUser(){
        
        $this->view->showLogin();
    }

    //Valida info enviada desde el form de login contra la db
    function verifyUser(){

        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email) || empty($password)){
            $this->view->showErrorLogin('log','Completar datos');
            die();
        }
        
        $user = $this->model->getByEmail($email);
             
        if($user && password_verify( $password,$user->password)){
            
            $this->authHelper->login($user);
            $this->view->showConfirmLogin('log','Bienvenido '.$user->email);
               
        }else{
            $this->view->showErrorLogin('log','Acceso Denegado');
        }

    }
    
    function logout() {
        
        $this->authHelper->logout();
    }
     

    
}