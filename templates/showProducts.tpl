    {include 'header.tpl'}

    <main class="container">
    
     <div class="d-flex justify-content-center fluid bg-secondary rounded-pill">
    {if $ruta=='home'}
         <h1 class="text-light">OFERTAS</h1>
    {else if $ruta=='allProd'}
       <h1 class="text-light">TODOS NUESTROS PRODUCTOS</h1>
    {else if $ruta=='filtrar'}
      <h1 class="text-light">{$cat->nombre|upper}</h1>
    {/if}
    </div>
        <table class="table table-striped my-5">
            <thead>
               {if isset($smarty.session.ID_USER)}
                <th>ID</th>
                {/if}
                <th>NOMBRE</th>
                {if isset($smarty.session.ID_USER)}
                <th>DESCRIPCION</th>
                {/if}
                <th>PRECIO</th>
                <th>OFERTA</th>
                {if $ruta!='filtrar'}
                <th>CATEGORIA</th>
                {/if}
                {if isset($smarty.session.ID_USER)}
                <th> <a href="insertar" class='btn btn-primary font-italic'>Agregar Prod.</a></th>
                {/if}
            </thead>
        
            {foreach from=$products item=product}
                <tr>
                {if isset($smarty.session.ID_USER)}
                <td>{$product->id}</td>
                {/if}
                <td>{$product->nombre}</td>
                {if isset($smarty.session.ID_USER)}
                <td>{$product->descripcion}</td>
                {/if}
                <td>{$product->precio}</td>
                {if $product->oferta =='1'}
                <td>Si</td>
                {else}
                <td>No</td>
                {/if}
                {if $ruta!='filtrar'}
                <td>{$product->nombre_categoria}</td>
                {/if}
                <td><a class='btn btn-success btn-sm' href='details/{$product->id}'>Detalle</a></td>
                {if isset($smarty.session.ID_USER)}
                <td><a class='btn btn-danger btn-sm' href='eliminar/{$product->id}'>Eliminar</a></td>
                <td><a class='btn btn-secondary btn-sm' href='update/{$product->id}'>Editar</a></td>
                {/if}
                </tr>
            {/foreach}
        </table>

        {include 'footer.tpl'}

    </main>
</body>
</html>