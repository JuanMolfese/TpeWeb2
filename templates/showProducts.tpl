{include 'header.tpl'}

<main class="container">
    
    <div class="d-flex justify-content-center fluid bg-secondary">
     {*Segun la condicion se muestra un titulo acorde*}
    {if $ruta=='home'}
         <h3 class="text-light">Ofertas</h3>
    {else if $ruta=='allProd'}
       <h3 class="text-light">Todos nuestros productos</h3>
    {else if $ruta=='filtrar'}
      <h3 class="text-light">{$cat->nombre}</h3>
    {/if}
    </div>

    {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
    <div class="m-3 d-flex justify-content-end">
        <a href="insertar" class='btn btn-primary font-italic'><i class='fas fa-plus'></i> Agregar Producto</a>
    </div>
    {/if}
        
    {foreach from=$products item=product}
    <div class="card col-12 bg-light my-2">

        <div class="row">

            <div class="col-3 bg-white">
                <img class="card-img img-fluid" src="{$product->imagen}">
            </div>

            <div class="col-9">
                <div class="d-flex columns col-12 align-items-center">
                    <div class="card-body col-9">

                        <h5 class="card-title text-capitalize"> {$product->nombre}</h5>

                        {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
                            <p>id: {$product->id}</p>
                        {/if}

                        <p class="card-text text-break">{$product->descripcion}</p>
                        <p class="card-text font-weight-bold">$ {$product->precio}</p>
                        
                        {if $product->oferta =='1'}
                            <p class="text-primary">Producto en oferta ! </p>                        
                        {/if}
                        {if $ruta!='filtrar'}
                            <p class="text-muted">Categoria: {$product->nombre_categoria}
                        {/if}

                    </div>

                    <div class="card-body col-3 text-center mx-auto">

                        <a class='btn btn-secondary mb-4' href='details/{$product->id}'><i class='fas fa-glasses'></i> Detalle</a>

                        {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
                            <a class='btn btn-danger mb-4' href='eliminar/{$product->id}'><i class='far fa-trash-alt'></i> Eliminar</a>
                            <a class='btn btn-secondary mb-4' href='update/{$product->id}'><i class='far fa-edit'></i> Editar</a>
                             <a class='btn btn-danger mb-4' href='eliminarImg/{$product->id}'><i class='far fa-trash-alt'></i> Imagen</a>
                        {/if}

                    </div>

                </div>
            </div>
        </div>       
    </div>    
    {/foreach}
    
    <nav aria-label="Page navigation example">
   <ul class="pagination justify-content-center">
   {if $ruta =='filtrar'} 
      {if $start>0} 
        <li class="page-item"><a class="page-link" href="{$ruta}/{$product->id_categoria}/{$start-$end}">Anterior</a></li> 
     {/if}      
           
        <li class="page-item"><a class="page-link" href="{$ruta}/{$product->id_categoria}/{$start+$end}">Siguiente</a></li>
   
  
  {else}
    {if $start>0} 
        
        <li class="page-item"><a class="page-link" href="{$ruta}/{$start-$end}">Anterior</a></li> 
    {/if}      
       <li class="page-item"><a class="page-link" href="{$ruta}/{$start+$end}">Siguiente</a></li>
   {/if}    
  </ul>
</nav>
     

    {include 'footer.tpl'}

</main>
</body>
</html>