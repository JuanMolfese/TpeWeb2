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
   
    function insertnewUser($newUser, $pass) {
        $query = $this->db->prepare ('INSERT INTO usuario (email, password) VALUES (?,?)');
        return $query->execute ([$newUser,$pass]);
        
    }

    function getAll (){
        $query = $this->db->prepare ('SELECT * FROM usuario');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);

    }

    function delete($id) {  
        
        $query = $this->db->prepare('DELETE FROM usuario WHERE id = ?');
        return $query->execute([$id]);      
    }

    function getSelecteduser ($id){
        $query = $this->db-> prepare ('SELECT * FROM usuario WHERE id=?');    
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function recordUpdateUser($id, $nombre, $password,$admin){
        $query = $this->db->prepare('UPDATE usuario SET id=?, email=?, password=?, admin=? WHERE id='.$id.' ');
        return $query->execute([$id, $nombre, $password, $admin]);
    }
}