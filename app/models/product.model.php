<?php

class ProductModel{

    private $db;

    function __construct() {
    
       $this->db = $this->connect();
    }

    // Abre conexión a la base de datos
    private function connect() {
    
        return $db = new PDO('mysql:host=localhost;'.'dbname=db_venta_tec;charset=utf8', 'root', '');        
    }

    function getAll() {

        $query = $this->db->prepare('SELECT * FROM producto');
        $query->execute();
    
        return $products = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de productos de la tabla
    }

   function getSelectedCat($id) {

        $query = $this->db-> prepare ('SELECT * FROM producto WHERE id_categoria=?');
        $query->execute([$id]);
    
        return $category= $query->fetchAll(PDO::FETCH_OBJ);    
   }

   function getSelectedProd($id) {
        
        $query = $this->db-> prepare ('SELECT * FROM producto WHERE id=?');    
        $query->execute([$id]);

        return $product= $query->fetch(PDO::FETCH_OBJ);    
   }

    function insert($nombre, $descripcion, $precio, $oferta, $categoria) {

        $query = $this->db->prepare('INSERT INTO producto (nombre, descripcion, precio, oferta, id_categoria) VALUES (?,?,?,?,?)');
 
        $query->execute([$nombre, $descripcion, $precio, $oferta, $categoria]);

        //return $query->lastInsertId();
    }

    function remove($id) {  
  
        $query = $this->db->prepare('DELETE FROM producto WHERE id = ?');
        $query->execute([$id]);
    }
    function RecordUpdateProduct($id, $nombre, $descripcion, $precio, $oferta, $categoria){
        
        $query = $this->db->prepare('UPDATE producto SET nombre=?, descripcion=?, precio=?,oferta=?,id_categoria=? WHERE id='.$id.' ');
        $query->execute([$nombre, $descripcion, $precio, $oferta, $categoria]);
    }

}