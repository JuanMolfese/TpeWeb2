    {include 'header.tpl'}

    <main class="container">

        <h3 class="mb-4">Cargar un nuevo producto</h3>
        <form id="form-add" action="insertar" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                    <input name="descripcion" type="text" class="form-control" id="input_product_description" aria-describedby="Ingresar detalles del producto" maxlength="50" required>
                </div>
                <div class='form-group col-md-4 p-0'>
                    <label for='cat_select'>Categoria</label>
                    <select class='custom-select' name='categoria' id='cat_select'>
                       
                       {*genera select con todas las categorias*}
                        {foreach from=$categorys item=category}
                                <option value='{$category->id}' >{$category->nombre}</option>
                        {/foreach}
                       
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

                <div class="form-group mt-4">
                    <label for="add_image_product">Agregar imagen del producto</label>
                    <input type="file" name="imagen_prod" class="form-control-file" id="add_image_product">
                </div>

                <div class="form-group m-auto col-md-10 d-flex justify-content-around pt-5">
                    <button type="submit" id="btn-cargar" class="btn btn-primary btn-lg">Cargar</button>
                    <a href="allProd" class='btn btn-secondary btn-lg'>Volver</a>
                </div>
            </div>

        </form>

        {include 'footer.tpl'}

    </main> 

</body>
</html>