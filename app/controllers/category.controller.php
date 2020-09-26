<?php
include_once 'app/models/category.model.php';
include_once 'app/views/category.view.php';


class CategoryController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();

    }

    function showAllcats () {
        
    }