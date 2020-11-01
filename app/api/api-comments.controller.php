<?php
require_once 'app/models/comment.model.php';
require_once 'app/models/user.model.php';
require_once 'app/api/api.view.php';



class ApiComments {

    private $model;
    private $usermodel;
    private $view;

    function __construct() {
        $this->model = new CommentsModel();
        $this->usermodel = new userModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    // Lee la variable asociada a la entrada estandar y la convierte en JSON
    function getData(){ 
        return json_decode($this->data); 
    } 

    function getAll($params = null) {
        $comments = $this->model->getAll($params);
        $this->view->response($comments, 200);
    }

    function get($params = null) {
        // $params es un array asociativo con los parámetros de la ruta
        $idComment = $params[':ID'];
        $comment = $this->model->get($idComment);
        if ($comment)
            $this->view->response($comment, 200);
        else
            $this->view->response("El comentario con el id=$idComment no existe", 404);
    }

    function delete($params = null) {
        $idComment = $params[':ID'];
        
        $success = $this->model->delete($idComment);
        if ($success) {
            $this->view->response("El comentario con id=$idComment se borró exitosamente", 200);
        }
        else { 
            $this->view->response("El comentario con id=$idComment no existe", 404);
        }
    }

    function insert($params = null) {

        $body = $this->getData();
        
        $comentario       = $body->comentario;
        $puntaje          = $body->puntaje;
        $id_producto      = $body->id_producto;
        $id_usuario       = $body->id_usuario;
        
        $checkUser = $this->usermodel->getSelecteduser($id_usuario);
                
        if($checkUser){
            $success = $this->model->insert($puntaje, $comentario, $id_usuario, $id_producto);
            
                if ($success > 0) {
                    $this->view->response("Se agrego el comentario exitosamente", 200);
                }
                else { 
                    $this->view->response("No se pudo generar el comentario", 500);
                }
        }else{
            $this->view->response("El usuario no existe", 404);
        }
    }

    function update($params = null) {
        
        $idComment = $params[':ID'];
        
        $body = $this->getData();
        
        $comentario       = $body->comentario;
        $puntaje          = $body->puntaje;
        $id_producto      = $body->id_producto;
        $id_usuario       = $body->id_usuario;
        
        $checkUser = $this->usermodel->getSelecteduser($id_usuario);                
        
        if($checkUser){
            $success = $this->model->update($puntaje, $comentario, $id_usuario, $id_producto, $idComment);
            if ($success) {
                $this->view->response("Se actualizó el comentario $idComment exitosamente", 200);
            }
            else { 
                $this->view->response("No se pudo actualizar", 500);
            }
        }else{
            $this->view->response("El usuario no existe", 404);
        }
    }

}