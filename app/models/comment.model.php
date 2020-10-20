<?php

include_once 'app/helpers/db.helper.php';

class CommentsModel{

  private $db;

  function __construct() {
  
    $this->dbHelper = new DBHelper();
    $this->db = $this->dbHelper->connect();
  
  }

}