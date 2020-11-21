{include 'header.tpl'}

<main class="container">

    <h4 class='mb-4 text-secondary'>Detalle de {$product->nombre}</h4>
    
    <div class='d-flex row mx-5'>

        <div class='form-group pt-6 col-md-7 p-0'>
            <label class="font-weight-bold" for='input_product_name'>Nombre del producto</label>
            <input type='text' value="{$product->nombre}" class='form-control bg-transparent border-0' id='input_product_name' readonly>
        </div>

        <div class='form-group form-check col-md-5 pl-md-5 p-0'>
            <label class="font-weight-bold" for='input_product_cost'>Precio</label>
            <input type='number' value="{$product->precio}" class='form-control bg-transparent border-0' id='input_product_cost' readonly>
        </div>
        
        <div class='form-group col-md-12 p-0 mb-5'>
            <label class="font-weight-bold" for='input_product_description'>Descripcion</label>
            <input type='text' value="{$product->descripcion}" class='form-control bg-transparent border-0' id='input_product_description' readonly>
        </div>
        
        
        <form id="js-form-details" class="col-12">
            <div class='form-group m-auto col-md-10 d-flex justify-content-around pt-5'>
                <a href='home' class='btn btn-info'><i class='fas fa-reply'></i> Volver</a>
                <a href='addComment/{$product->id}' class='btn btn-primary'><i class='fas fa-plus'></i> Agregar Comentario</a>
                <a href='showComments/{$product->id}' class='btn btn-secondary'><i class='far fa-comments'></i> Ver Comentarios</a>
            </div>
        </form>

    </div>

    {include 'footer.tpl'}
    <script> src="js/comment.js"</script>
    
</main> 

</body>
</html>