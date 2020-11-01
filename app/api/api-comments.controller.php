<?php
require_once 'app/models/comment.model.php';
require_once 'app/api/api.view.php';


class ApiComments {

    private $model;
    private $view;

    function __construct() {
        $this->model = new CommentsModel();
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
        $task = $this->model->get($idComment);
        if ($task)
            $this->view->response($task, 200);
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

        $id = $this->model->insert($puntaje, $comentario, $id_usuario, $id_producto);

        if ($id > 0) {
            $this->view->response("Se agrego el comentario exitosamente, bajo la identificacion $id", 200);
        }
        else { 
            $this->view->response("No se pudo generar el comentario", 500);
        }
    }

}