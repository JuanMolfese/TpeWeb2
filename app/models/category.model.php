<?php

class CategoryModel{

  private $db;

  function __construct() {
  
      $this->db = $this->connect();
  }

  private function connect() {
  
    return $db = new PDO('mysql:host=localhost;'.'dbname=db_venta_tec;charset=utf8', 'root', '');        
  }

  //solicita a la base de datos todos los elementos de tabla categoria y los asigna a un objeto
  function getAllcategorys() {

    $query = $this->db->prepare('SELECT * FROM categoria');
    $query->execute();    
    return $query->fetchAll(PDO::FETCH_OBJ); 
  }

  //solicita a base de datos una categoria especifica, y la asigna a un objeto
  function getSelectedcat ($id) {

    $query = $this->db-> prepare ('SELECT nombre FROM categoria WHERE id=?');    
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_OBJ);
  }

  //solicita a la base de datos el elemento de la tabla categoria segun id
  function getAllSelectedCat($id) {

    $query = $this->db-> prepare ('SELECT * FROM categoria WHERE id=?');    
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_OBJ);    
  }

  //inserta a base de datos categoria editada
  function RecordUpdatecat($id, $nombre, $descripcion){
        
    $query = $this->db->prepare('UPDATE categoria SET nombre=?, descripcion=? WHERE id='.$id.' ');
    return $query->execute([$nombre, $descripcion]);
  }

  //borra categoria especificada segun id
  function remove($id) {  
         
    $query = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
    return $query->execute([$id]);      
  }
  
  //graba nueva categoria
  function insert($nombre, $descripcion) {

  $query = $this->db->prepare('INSERT INTO categoria (nombre, descripcion) VALUES (?,?)'); 
  return $query->execute([$nombre, $descripcion]);
  }
}