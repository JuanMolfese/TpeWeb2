<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Tech</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    
    {include 'header.tpl'}

    <main class="container">

        <h3 class='mb-4'>Actualizar producto</h3>
        <form id='form-add' action='editar' method='POST'>
            <div class='d-flex row'>

                <div class='form-group pt-6 col-md-7 p-0'>
                    <label for='input_product_name'>Nombre del producto</label>
                    <input name='nombre' type='text' value="{$product->nombre}" class='form-control' id='input_product_name' maxlength='30' required>
                </div>

                <div class='form-group form-check col-md-5 pl-md-5 p-0'>
                    <label for='input_product_cost'>Precio</label>
                    <input name='precio' type='number' value="{$product->precio}" class='form-control' id='input_product_cost' maxlength='11' required>
                </div>
                
                <div class='form-group col-md-12 p-0'>
                    <label for='input_product_description'>Descripcion</label>
                    <input name='descripcion' type='text' value="{$product->descripcion}" class='form-control' id='input_product_description' maxlength='50'>
                </div>

                <div class='form-group col-md-4 p-0'>
                <label for='input_product_id_cat_select'>Cambiar Categoria</label>
                    <select class='custom-select' name='categoria' id='input_product_id_cat'>
                       
                    {foreach from=$categorys item=category}
                             <option value='{$category->id}' 
                                {if ($product->id_categoria == $category->id)}
                                    {'selected'}
                                {/if}                             
                             >{$category->nombre}</option>
                    {/foreach}
                       
                    </select>
                </div>

                <div class='form-group col-md-3 p-0 mt-4 ml-5 d-flex justify-content-around'>
                    <label class='d-flex align-items-center mb-0' for='input_product_oferta'>Esta en oferta ?</label>
                    <div class='form-check form-check-inline' id='input_product_oferta'>
                        <input class='form-check-input' type='radio' name='oferta' id='inlineRadio1' value='0' checked>
                        <label class='form-check-label' for='inlineRadio1'>No</label>
                    </div>
                    <div class='form-check form-check-inline'>
                        <input class='form-check-input' type='radio' name='oferta' id='inlineRadio2' value='1'>
                        <label class='form-check-label' for='inlineRadio2'>Si</label>
                    </div>
                </div>
                <input type='hidden' value={$product->id} name='idProducto'>

                <div class='form-group m-auto col-md-10 d-flex justify-content-around pt-5'>
                    <button type='submit' id='btn-guardar' class='btn btn-info btn-lg'>Guardar</button>
                </div>

            </div>

        </form>

        {include 'footer.tpl'}

    </main> 

</body>
</html>