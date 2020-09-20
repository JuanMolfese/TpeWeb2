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
        
        echo "<h1> ERROR!</h1>";
        echo "<h2> $msg </h2>";

        /*echo '
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <p>'$msg'</p>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>';
        */
    }
}