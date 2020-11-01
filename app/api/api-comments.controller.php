<?php
require_once 'app/models/comment.model.php';
require_once 'app/api/api.view.php';


class ApiComments {

    private $model;
    private $view;

    function __construct() {
        $this->model = new CommentsModel();
        $this->view = new APIView();
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

}