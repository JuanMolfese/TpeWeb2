{include 'header.tpl'}

<main class="container">

    <h4 class='mb-4 text-secondary'>Detalle de {$product->nombre}</h4>
    
    <div class='d-flex row mx-5'>

        <div class='form-group pt-6 col-md-7 p-0'>
            <label for='input_product_name'>Nombre del producto</label>
            <input type='text' value="{$product->nombre}" class='form-control' id='input_product_name' readonly>
        </div>

        <div class='form-group form-check col-md-5 pl-md-5 p-0'>
            <label for='input_product_cost'>Precio</label>
            <input type='number' value="{$product->precio}" class='form-control' id='input_product_cost' readonly>
        </div>
        
        <div class='form-group col-md-12 p-0'>
            <label for='input_product_description'>Descripcion</label>
            <input type='text' value="{$product->descripcion}" class='form-control' id='input_product_description' readonly>
        </div>
        
        <div class='form-group m-auto col-md-10 d-flex justify-content-around pt-5'>
            <a href='home' class='btn btn-info btn-lg'>Volver</a>
        </div>

    </div>

    {include 'footer.tpl'}

</main> 

</body>
</html>