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
            echo "<td><a class='btn btn-danger btn-sm' href='eliminar/$product->id'>ELIMINAR</a></td>";
            echo "<td><a class='btn btn-primary btn-sm' href='update'>EDITAR</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        include_once 'templates/footer.php';
    }
    
    function showError($msg){
        
        echo "<h1> ERROR!</h1>";
        echo "<h2> $msg </h2>";

       /* echo "
        <div class='modal' tabindex='-1'>
        <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                <h5 class='modal-title'>Error</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>
                        <div class='modal-body'>
                            <p>$msg</p>
                            </div>
                            <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                        </div>
                </div>
                </div>
                </div>";*/
                
    }

    function showAddForm(){

        //si esto funciona deberiamos borrar el archivo form.add.php
       // ??  Debo incluir al product.controller para que llegue la info contenida en el post ???
       echo' <form id="form-add" action="insertar" method="POST">
        <div class="d-flex row">

            <div class="form-group pt-6 col-md-7 p-0">
                <label for="input_product_name">Nombre del producto</label>
                <input name="nombre" type="text" class="form-control" id="input_product_name" aria-describedby="Ingresar nombre del producto" maxlength="30" required>
            </div>

            <div class="form-group form-check col-md-5 pl-md-5 p-0">
                <label for="input_product_cost">Precio</label>
                <input name="precio" type="number" class="form-control" id="input_product_cost" aria-describedby="Ingresar precio del producto" maxlength="11" required>
            </div>

            <div class="form-group col-md-12 p-0">
                <label for="input_product_description">Descripcion</label>
                <input name="descripcion" type="text" class="form-control" id="input_product_description" aria-describedby="Ingresar detalles del producto" maxlength="50">
            </div>

            <div class="form-group col-md-6 p-0 mt-4">
                <select class="custom-select" name="categoria" id="input_product_id_cat">
                    <option selected>Seleccionar categoria</option>
                    <option value="1">Notebooks</option>
                    <option value="2">Tablet</option>
                    <option value="3">Celulares</option>
                </select>
            </div>

            <div class="form-group col-md-6 p-0 mt-4 d-flex justify-content-around">
                <label for="input_product_oferta">Esta en oferta ?</label>
                <div class="form-check form-check-inline" id="input_product_oferta">
                    <input class="form-check-input" type="radio" name="oferta" id="inlineRadio1" value="0" checked>
                    <label class="form-check-label" for="inlineRadio1">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="oferta" id="inlineRadio2" value="1">
                    <label class="form-check-label" for="inlineRadio2">Si</label>
                </div>
            </div>

            <div class="form-group m-auto col-md-10 d-flex justify-content-around pt-5">
                <button type="submit" id="btn-cargar" class="btn btn-primary btn-lg">Cargar</button>
                <button type="submit" id="btn-guardar" class="btn btn-info btn-lg disabled">Guardar</button>
            </div>

        </div>

    </form>';
    
    }
}