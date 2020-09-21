<!--<div class="container p-5">-->
<?php
include_once 'header.php';

echo 
    '<form>
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

    </form>
<!-- </div>-->
 ';  