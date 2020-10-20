<?php

include_once 'app/helpers/db.helper.php';

class userModel{

    private $db;

    function __construct() {
  
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
      
    }

    //solicita a base de datos usuario segun email
    function getByEmail($email){
        
        $query = $this->db->prepare ('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }



}