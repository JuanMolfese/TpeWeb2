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

  
    function addUser (){
     
        $this->view->showRegisterform();
         if (    (isset($_REQUEST['email']) && ($_REQUEST['email'] != null)) && 
        (isset($_REQUEST['password']) && ($_REQUEST['password'] != null)) &&
        (isset($_REQUEST['rePassword']) && ($_REQUEST['rePassword'] != null))){ 
       
            $newUser=$_POST['email'];
            $newPass=$_POST['password'];
            $newRepass=$_POST['rePassword'];
               
            if($newPass==$newRepass){
              $encryptPass= password_hash ($newPass , PASSWORD_DEFAULT );  
              $success=$this->model->insertnewUser($newUser,$encryptPass);
           
                if ($success){
                    $this->view->showConfirmLogin('addUser','Se creó usuario');
                    $user = $this->model->getByEmail($newUser);
                    $this->authHelper->login($user);
                }
                else{
                    $this->view->showErrorLogin('addUser','No se pudo crear el usuario');
                }
            }
             else {
                 $this->view->showErrorLogin('addUser','No coinciden contraseñas');
             }
        }
    }

  
    function showUsers(){
      
        $typeuser = $this->authHelper->checkLoggedIn();
        if($typeuser[0]){
            $allUsers=$this->model->getAll();
            $this->view->showList($allUsers);
        }
        else {
            header("Location: " . BASE_URL . "home");

        }
    }
     
  
    function deleteUser($id) {
       
        $typeuser = $this->authHelper->checkLoggedIn();
        if (($typeuser[0]) && ($typeuser[1]!=$id)){
          $success=$this->model->delete($id);
        
            if ($success){
            $this->view->showConfirmLogin('delUser','Se eliminó usuario');
            }
            else {
                $this->view->showErrorLogin('delUser','No se pudo borrar usuario');
            }
        }
        else { 
            $this->view->showErrorLogin('delUser','No puede borrarse a si mismo');    
            
        }
    }

   
    function updateUser ($id) {
       
        $typeuser = $this->authHelper->checkLoggedIn();
        if($typeuser[0]){
            $selected=$this->model->getSelecteduser($id);
            $this->view->showUpdateUserForm($selected);
        }
        else{
            header("Location: " . BASE_URL . "home");
        }
           
    }
   
  
    //Inserta en db usuario editado en funcion updateuser
    function insertUser(){
      
        if ((isset($_REQUEST['user']) && ($_REQUEST['user'] != null))) {                     
                $id = $_POST['idUser'];
                $nombre = $_POST['user'];
                $password = $_POST['passUser'];
                $admin = $_POST['admin'];
                $this->model->recordUpdateUser($id, $nombre, $password,$admin);
                header("Location: " . 'verUsuarios');
        }
    }

    


    
}