<?php

include_once 'app/models/comment.model.php';
include_once 'app/views/tables.view.php';
include_once 'app/helpers/auth.helper.php';

class CommentController {

    private $commentmodel;
    private $authHelper;
    private $view;
    
    
    function __construct() {
           
        $this->commentmodel = new CommentsModel();
        $this->authHelper = new AuthHelper();
        $this->view = new tablesView();
    }

function insertComment($id_product){

    $user = $this->authHelper->checkLoggedIn();
    if($user){
        $this->view->showaddComment($id_product);
    }
}

function recordComment($id_product){

    if (    (isset($_REQUEST['puntaje']) && ($_REQUEST['puntaje'] != null)) && 
        (isset($_REQUEST['comentario']) && ($_REQUEST['comentario'] != null))) {                             
            $puntaje = $_POST['puntaje'];
            $comentario = $_POST['comentario'];
            $userID = $_SESSION['ID_USER'];
                        
            // inserto comentario en la db
        $success = $this->commentmodel->insert($puntaje, $comentario,$userID,$id_product);
        
        if(!$success){
        $this->view->showError("addcom","No se pudo ingresar el comentario");
        }else{
            header("Location: " . BASE_URL . "details/$id_product");
        } 
    }
    else{
        header("Location: " . BASE_URL . "home");
    }
}

function listComments($id_product){        

$product = $this->model->getSelectedProd($id_product);
$this->view->showComments($product);           

}

function deleteComment($id, $id_product){

$typeuser = $this->authHelper->checkLoggedIn();

if($typeuser[0]){            
    $success=$this->commentmodel->delete($id);
    if ($success){
        header("Location: " . BASE_URL . "showComments/$id_product");
    }else{    
        $this->view->showError("delcom","No se pudo eliminar el comentario");   
    }
}else{    
    header("Location: " . BASE_URL . "home");
}
}
}