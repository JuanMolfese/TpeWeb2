<?php

class CommentsModel{

  private $db;

  function __construct() {
  
      $this->db = $this->connect();
  }

  // MOVER A HELPER
  private function connect() {
  
    return $db = new PDO('mysql:host=localhost;'.'dbname=db_venta_tec;charset=utf8', 'root', '');        
  }

}