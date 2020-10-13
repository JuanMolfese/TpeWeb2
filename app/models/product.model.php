<?php

class productModel{

    private $db;

    function __construct() {
    
       $this->db = $this->connect();
    }

    // Abre conexión a la base de datos
    private function connect() {
    
        return $db = new PDO('mysql:host=localhost;'.'dbname=db_venta_tec;charset=utf8', 'root', '');        
    }

    function getAll() {
        
        $sql='SELECT producto.*, categoria.nombre AS nombre_categoria, categoria.descripcion AS descripcion_categoria 
        FROM producto INNER JOIN categoria ON (producto.id_categoria=categoria.id)';
        $query = $this->db->prepare($sql);
        $query->execute();    
        return $query->fetchAll(PDO::FETCH_OBJ); // arreglo de productos de la tabla
    }

    function getAllOffer() {

        $query = $this->db->prepare('SELECT producto.*, categoria.nombre AS nombre_categoria, categoria.descripcion AS descripcion_categoria 
        FROM producto INNER JOIN categoria ON (producto.id_categoria=categoria.id) WHERE oferta=?');
        $query->execute([1]);
        return $query->fetchAll(PDO::FETCH_OBJ); // arreglo de productos de la tabla
    }

    function getAllSelectedCat($id) {

       $query = $this->db-> prepare ('SELECT * FROM producto WHERE id_categoria=?');
       $query->execute([$id]);
       return $query->fetchAll(PDO::FETCH_OBJ);
           
    }

   function getSelectedProd($id) {

        $query = $this->db-> prepare ('SELECT * FROM producto WHERE id=?');    
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);    
    }

    function insert($nombre, $descripcion, $precio, $oferta, $categoria) {

        $query = $this->db->prepare('INSERT INTO producto (nombre, descripcion, precio, oferta, id_categoria) VALUES (?,?,?,?,?)'); 
        return $query->execute([$nombre, $descripcion, $precio, $oferta, $categoria]);
        
    }

    function remove($id) {  
        
        $query = $this->db->prepare('DELETE FROM producto WHERE id = ?');
        return $query->execute([$id]);      
    }

    function RecordUpdateProduct($id, $nombre, $descripcion, $precio, $oferta, $categoria){
        
        $query = $this->db->prepare('UPDATE producto SET nombre=?, descripcion=?, precio=?,oferta=?,id_categoria=? WHERE id='.$id.' ');
        return $query->execute([$nombre, $descripcion, $precio, $oferta, $categoria]);
    }
   
        
}