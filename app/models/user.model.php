<?php

class userModel{

    private $db;

    function __construct() {
    
       $this->db = $this->connect();
    }

    // Abre conexión a la base de datos
    private function connect() {
    
        return $db = new PDO('mysql:host=localhost;'.'dbname=db_venta_tec;charset=utf8', 'root', '');        
    }

    function getByEmail($email){
        
        $query = $this->db->prepare ('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }



}