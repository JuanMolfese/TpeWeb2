<?php

class ProductModel{

    private $db;

    function __construct() {
         // 1. Abro la conexión
        $this->db = $this->connect();
    }

    /** Abre conexión a la base de datos;  */
    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_venta_tec;charset=utf8', 'root', '');
        return $db;
    }

    /** Devuelve todas las tareas de la base de datos.  */
    function getAll() {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM producto');
        $query->execute();

        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $products = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de tareas

        return $products;
    }

    /** Inserta la tarea en la base de datos    */
    function insert($nombre, $descripcion, $precio, $oferta, $categoria) {

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('INSERT INTO producto (nombre, descripcion, precio, oferta, categoria) VALUES (?,?,?,?,?)');
        $query->execute([$nombre, $descripcion, $precio, $oferta, $categoria]);

        // 3. Obtengo y devuelo el ID de la tarea nueva
        //return $this->db->lastInsertId();
    }

    function remove($id) {  
  
        $query = $this->db->prepare('DELETE FROM producto WHERE id = ?');
        $query->execute([$id]);
    }

}

