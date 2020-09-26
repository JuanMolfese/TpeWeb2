<?php

class CategoryModel{

    private $db;

    function __construct() {
    
       $this->db = $this->connect();
    }