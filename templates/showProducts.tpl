    {include 'header.tpl'}

    <main class="container">
    
     <div class="d-flex justify-content-center fluid bg-primary rounded-pill">
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
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>PRECIO</th>
                <th>OFERTA</th>
                <th>CATEGORIA</th>
                <th> <a href="insertar" class='btn btn-primary font-italic'>Agregar</a></th>
            </thead>
        
            {foreach from=$products item=product}
                <tr>
                <td>{$product->id}</td>
                <td>{$product->nombre}</td>
                <td>{$product->descripcion}</td>
                <td>{$product->precio}</td>
                <td>{$product->oferta}</td>
                <td>{$product->id_categoria}</td>
                <td><a class='btn btn-success btn-sm' href='details/{$product->id}'>Detalle</a></td>
                <td><a class='btn btn-danger btn-sm' href='eliminar/{$product->id}'>Eliminar</a></td>
                <td><a class='btn btn-secondary btn-sm' href='update/{$product->id}'>Editar</a></td>
                </tr>
            {/foreach}
        </table>

        {include 'footer.tpl'}

    </main>
</body>
</html>