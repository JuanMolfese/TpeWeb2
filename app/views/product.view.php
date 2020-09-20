<?php

include_once 'templates/header.php';

class ProductView{

    function showProducts($products) {
        echo "<table class=table table-striped>";
        echo"<thead>";
        echo"<td>ID</td>";
        echo"<td>NOMBRE</td>";
        echo"<td>DESCRIPCION</td>";
        echo"<td>PRECIO</td>";
        echo"<td>OFERTA</td>";
        echo"<td>CATEGORIA</td>";
        
        foreach($products as $product){
            echo "<tr>";
            echo "<td>$product->id</td>";
            echo "<td>$product->nombre</td>";
            echo "<td>$product->descripcion</td>";
            echo "<td>$product->precio</td>";
            echo "<td>$product->oferta</td>";
            echo "<td>$product->id_categoria</td>";
            echo "</table>";
        }
        include_once 'templates/footer.php';
    }
    
    function showError($msg){
        
    }
}