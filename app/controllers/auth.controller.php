<?php

include_once 'app/views/auth.view.php';
include_once 'app/models/user.model.php';

class authController{

    private $view;
    private $model;
    private $catmodel;

    function __construct(){
       
        $this->catmodel = new CategoryModel();
        $category_list = $this->catmodel->getAllcategorys();  //se instancia al modelo de tables.
        $this->view = new authView($category_list);
        $this->model = new userModel();
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
            session_start();
            $_SESSION['ID_USER'] = $user->id;
            $_SESSION['EMAIL_USER'] = $user->email;
            $this->view->showConfirmLogin('log','Bienvenido '.$user->email);
               
        }else{
            $this->view->showErrorLogin('log','Acceso Denegado');
        }

    }
    
    //Cierra la sesion
    function logout() {
      
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    }

    
}