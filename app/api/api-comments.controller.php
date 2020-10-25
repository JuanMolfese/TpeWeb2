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
        $comments = $this->model->getAll($idProd);
        $this->view->response($comments, 200);
    }

    function get($params = null) {
        // $params es un array asociativo con los parámetros de la ruta
        $idTask = $params[':ID'];
        $task = $this->model->get($idTask);
        if ($task)
            $this->view->response($task, 200);
        else
            $this->view->response("La tarea con el id=$idTask no existe", 404);
    }

    function delete($params = null) {
        $idTask = $params[':ID'];
        $success = $this->model->remove($idTask);
        if ($success) {
            $this->view->response("La tarea con el id=$idTask se borró exitosamente", 200);
        }
        else { 
            $this->view->response("La tarea con el id=$idTask no existe", 404);
        }
    }

}