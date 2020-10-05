<?php

class CategoryModel{

    private $db;

    function __construct() {
    
       $this->db = $this->connect();
    }

    private function connect() {
    
      return $db = new PDO('mysql:host=localhost;'.'dbname=db_venta_tec;charset=utf8', 'root', '');        
  }

    function getAllcategorys() {

      $query = $this->db->prepare('SELECT * FROM categoria');
      $query->execute();    
      return $category = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de productos de la tabla
  }
  function getSelectedcat ($id) {
    $query = $this->db-> prepare ('SELECT nombre FROM categoria WHERE id=?');    
    $query->execute([$id]);
    return $category= $query->fetch(PDO::FETCH_OBJ);
  }
  function getAllSelectedCat($id) {

    $query = $this->db-> prepare ('SELECT * FROM categoria WHERE id=?');    
    $query->execute([$id]);
    return $category= $query->fetch(PDO::FETCH_OBJ);    
}
function RecordUpdatecat($id, $nombre, $descripcion){
        
  $query = $this->db->prepare('UPDATE categoria SET nombre=?, descripcion=? WHERE id='.$id.' ');
  return $query->execute([$nombre, $descripcion]);
}
function remove($id) {  
         
  $query = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
  return $query->execute([$id]);      
}
function insert($nombre, $descripcion) {

  $query = $this->db->prepare('INSERT INTO categoria (nombre, descripcion) VALUES (?,?)'); 
  return $query->execute([$nombre, $descripcion]);
}
}