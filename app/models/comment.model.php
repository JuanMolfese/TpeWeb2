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

  function getAllbyProduct($id_product){
    $query = $this->db-> prepare ('SELECT comentario.id, comentario.puntaje ,comentario.comentario,comentario.id_producto, usuario.email, producto.nombre 
                                  FROM comentario INNER JOIN usuario ON (comentario.id_usuario=usuario.id) INNER JOIN producto ON (comentario.id_producto = producto.id)
                                  WHERE comentario.id_producto = ? ');    
    $query->execute([$id_product]);
    return $query->fetchAll(PDO::FETCH_OBJ);  
  }

  function getAll(){
    $query = $this->db-> prepare ('SELECT * FROM comentario');    
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);  
  }

  function delete($id) {  
        
    $query = $this->db->prepare('DELETE FROM comentario WHERE id = ?');
    return $query->execute([$id]);      
  }

  /*function get($id){
    $query = $this->db-> prepare ('SELECT comentario.*, producto.nombre FROM comentario INNER JOIN producto ON (comentario.id_producto = producto.id) WHERE producto.id = ? ');    
    $query->execute([$id]);
    return $query->fetchAll(PDO::FETCH_OBJ);
  }*/

  function update($puntaje, $comentario, $id_usuario, $id_producto, $idComment){    
    $sql = "UPDATE comentario SET puntaje = ?, comentario = ?, id_usuario = ?, id_producto = ? WHERE id = ?";
    $query = $this->db->prepare($sql);
    $result = $query->execute([$puntaje, $comentario, $id_usuario, $id_producto, $idComment]);
    return $result;
  }

}