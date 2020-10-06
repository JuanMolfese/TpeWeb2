<?php

include_once 'app/views/auth.view.php';
include_once 'app/models/user.model.php';

class authController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new authView();
        $this->model = new userModel();
    }

    function loginUser(){
        
        $this->view->showLogin();

    }

    function verifyUser(){

        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email) || empty($password)){
            echo'Completar datos';
            die();
        }
        
        $user = $this->model->getByEmail($email);
             
            if($user && password_verify( $password,$user->password)){
                $this->view->showConfirm('log','Bienvenido '.$user->email);
            }else{
                $this->view->showError('log','Acceso Denegado');
            }

    }
}