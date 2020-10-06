<?php

include_once 'app/views/auth.view.php';
include_once 'app/models/user.model.php';

class authController{

    private $view;
    private $model;
    private $catmodel;

    function __construct(){
        $this->catmodel = new CategoryModel();
        $category_list = $this->catmodel->getAllcategorys();  //se instacia al modelo de tables.
        $this->view = new authView($category_list);
        $this->model = new userModel();
    }

    function loginUser(){
        
        $this->view->showLogin();

    }

    function verifyUser(){

        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email) || empty($password)){
            $this->view->showErrorLogin('log','Completar datos');
            die();
        }
        
        $user = $this->model->getByEmail($email);
             
            if($user && password_verify( $password,$user->password)){
                $this->view->showConfirmLogin('log','Bienvenido '.$user->email);
            }else{
                $this->view->showErrorLogin('log','Acceso Denegado');
            }

    }
}