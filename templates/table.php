<?php


function showProducts() {
   
 $products=getproducts();
 echo "<table class=table table-striped>";
 echo"<thead>";
 echo"<td>ID</td>";
 echo"<td>NOMBRE</td>";
 echo"<td>DESCRIPCION</td>";
 echo"<td>PRECIO</td>";
 echo"<td>CATEGORIA</td>";
 
 foreach($products as $product){
   echo "<tr>";
   echo "<td>$product->id</td>";
   echo "<td>$product->deudor</td>";
   echo "<td>$product->cuota</td>";
   echo "<td>$product->cuota_capital</td>";
   echo "<td>$product->fecha_product</td>";
 }
 include 'templates/footer.php';
}