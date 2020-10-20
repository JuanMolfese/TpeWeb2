<?php

class DBHelper {
    public function __construct() {
    }

    public function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_venta_tec;charset=utf8', 'root', '');
        return $db;
    }    
}