<?php

include_once 'app/helpers/db.helper.php';

class productModel{

    private $db;

    //Se genera un constructor para que al instanciar un obj de esta clase, se abra la conexion a la db.
    function __construct() {
  
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
      
      }

    //Devuelve lista de todos los productos de la db y se le adiciona el nombre de la categoria desde la tabla categoria
    function getAll() {
        
        $sql='SELECT producto.*, categoria.nombre AS nombre_categoria, categoria.descripcion AS descripcion_categoria 
        FROM producto INNER JOIN categoria ON (producto.id_categoria=categoria.id)';
        $query = $this->db->prepare($sql);
        $query->execute();    
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    
     //Devuelve lista de todos los productos que estan en OFERTA de la db y se le adiciona el nombre de la categoria desde la tabla categoria
    function getAllOffer($start){
       
        $query = $this->db->prepare('SELECT producto.*, categoria.nombre AS nombre_categoria, categoria.descripcion AS descripcion_categoria FROM producto INNER JOIN categoria ON (producto.id_categoria=categoria.id) WHERE oferta=? LIMIT '.$start.',3');
        $query->execute([1]);
        
        
        return $query->fetchAll(PDO::FETCH_OBJ); 
        
    }


    

    //Devuelve lista de productos de una determinada categoria
    function getAllSelectedCat($id) {

       $query = $this->db-> prepare ('SELECT * FROM producto WHERE id_categoria=?');
       $query->execute([$id]);
       return $query->fetchAll(PDO::FETCH_OBJ);
           
    }

    //Devuelve un producto segun id
    function getSelectedProd($id) {

        $query = $this->db-> prepare ('SELECT * FROM producto WHERE id=?');    
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);    
    }

    //Inserta un nuevo producto en la tabla producto
    function insert($nombre, $descripcion, $precio, $oferta, $categoria, $imagen = null) {

        if($imagen){
            $query = $this->db->prepare('INSERT INTO producto (nombre, descripcion, precio, oferta, id_categoria, imagen) VALUES (?,?,?,?,?,?)'); 
            return $query->execute([$nombre, $descripcion, $precio, $oferta, $categoria, $imagen]);
        }else{
            $query = $this->db->prepare('INSERT INTO producto (nombre, descripcion, precio, oferta, id_categoria) VALUES (?,?,?,?,?)'); 
            return $query->execute([$nombre, $descripcion, $precio, $oferta, $categoria]);
        }
    }

    //Elimina un producto de la tabla segun id
    function remove($id) {  
        
        $query = $this->db->prepare('DELETE FROM producto WHERE id = ?');
        return $query->execute([$id]);      
    }

    //Actualiza datos de un producto en la tabla productos
    function RecordUpdateProduct($id, $nombre, $descripcion, $precio, $oferta, $categoria, $imagen = null){
        
        if($imagen){
            $query = $this->db->prepare('UPDATE producto SET nombre=?, descripcion=?, precio=?,oferta=?,id_categoria=?, imagen=? WHERE id='.$id.' ');
            return $query->execute([$nombre, $descripcion, $precio, $oferta, $categoria, $imagen]);
        }else{
            $query = $this->db->prepare('UPDATE producto SET nombre=?, descripcion=?, precio=?,oferta=?,id_categoria=? WHERE id='.$id.' ');
            return $query->execute([$nombre, $descripcion, $precio, $oferta, $categoria]);
        }
    }
   
        
}