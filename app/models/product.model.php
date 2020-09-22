<?php

class ProductModel{

    private $db;

    function __construct() {
    
       $this->db = $this->connect();
    }

    // Abre conexión a la base de datos
    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_venta_tec;charset=utf8', 'root', '');
        return $db;
    }

   
    function getAll() {

        $query = $this->db->prepare('SELECT * FROM producto');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de productos de la tabla
        return $products;
    }
   function getSelectedCat($id) {
    $query = $this->db-> prepare ('SELECT * FROM producto WHERE id_categoria=?');
    
    $query->execute([$id]);
    $category= $query->fetchAll(PDO::FETCH_OBJ);
    return $category;
   }

   function getSelectedProd($id) {
    $query = $this->db-> prepare ('SELECT * FROM producto WHERE id=?');
    
    $query->execute([$id]);
    $product= $query->fetchAll(PDO::FETCH_OBJ);
    return $product;
   }

    function insert($nombre, $descripcion, $precio, $oferta, $categoria) {

        $query = $this->db->prepare('INSERT INTO producto (nombre, descripcion, precio, oferta, id_categoria) VALUES (?,?,?,?,?)');
        $query->execute([$nombre, $descripcion, $precio, $oferta, $categoria]);
    }

    function remove($id) {  
  
        $query = $this->db->prepare('DELETE FROM producto WHERE id = ?');
        $query->execute([$id]);
    }

}