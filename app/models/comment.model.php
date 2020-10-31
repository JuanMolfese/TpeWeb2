<?php

include_once 'app/helpers/db.helper.php';

class CommentsModel{

  private $db;

  function __construct() {
  
    $this->dbHelper = new DBHelper();
    $this->db = $this->dbHelper->connect();
  
  }

  //Inserta un nuevo comentario
  function insert($puntaje, $comentario,$userID,$id_product) {
 
    $query = $this->db->prepare('INSERT INTO comentario (puntaje, comentario, id_usuario, id_producto) VALUES (?,?,?,?)'); 
    return $query->execute([$puntaje, $comentario,$userID,$id_product]);    
  }

  function getAll($id_product){
    $query = $this->db-> prepare ('SELECT comentario.id, comentario.puntaje ,comentario.comentario,comentario.id_producto, usuario.email 
                                  FROM comentario INNER JOIN usuario ON (comentario.id_usuario=usuario.id) 
                                  WHERE comentario.id_producto = ? ');    
    $query->execute([$id_product]);
    return $query->fetchAll(PDO::FETCH_OBJ);  
  }

  /* function getValorations($id_product){
    $query = $this->db-> prepare ('SELECT comentario.id, comentario.puntaje ,comentario.comentario, usuario.email 
    FROM comentario INNER JOIN usuario ON (comentario.id_usuario=usuario.id) 
    WHERE comentario.id_producto = ? ');    
$query->execute([$id_product]);
return $query->fetchAll(PDO::FETCH_OBJ); 
  } */

}