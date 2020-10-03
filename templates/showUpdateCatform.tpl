 {include 'header.tpl'}

    <main class="container">

        <h3 class='mb-4'>Actualizar categoria</h3>
        <form id='form-add' action='editarCat' method='POST'>
            <div class='d-flex row'>

                <div class='form-group pt-6 col-md-7 p-0'>
                    <label for='input_product_name'>Categoria</label>
                    <input name='nombreCat' type='text' value="{$category->nombre}" class='form-control' id='input_category_name' maxlength='30' required>
                </div>

                <div class='form-group col-md-12 p-0'>
                    <label for='input_product_description'>Descripcion</label>
                    <input name='descripcionCat' type='text' value="{$category->descripcion}" class='form-control' id='input_category_description' maxlength='50'>
                </div>

                <input type='hidden' value={$category->id} name='idCategoria'>

                <div class='form-group m-auto col-md-10 d-flex justify-content-around pt-5'>
                    <button type='submit' id='btn-guardar' class='btn btn-info btn-lg'>Guardar</button>
                </div>

            </div>

        </form>

        {include 'footer.tpl'}

    </main> 

</body>
</html>