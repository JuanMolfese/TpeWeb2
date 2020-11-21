{include 'header.tpl'}

<main class="container">
    
    <div class="d-flex justify-content-center fluid bg-secondary rounded-pill">
     {*Segun la condicion se muestra un titulo acorde*}
    {if $ruta=='home'}
         <h3 class="text-light">Ofertas</h3>
    {else if $ruta=='allProd'}
       <h3 class="text-light">Todos nuestros productos</h3>
    {else if $ruta=='filtrar'}
      <h3 class="text-light">{$cat->nombre|upper}</h3>
    {/if}
    </div>

    {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
    <div class="m-3 d-flex justify-content-end">
        <a href="insertar" class='btn btn-primary font-italic'>Agregar Producto</a>
    </div>
    {/if}
        
    {foreach from=$products item=product}
    <div class="card col-12 bg-light m-2">

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

                        <a class='btn btn-secondary mb-4' href='details/{$product->id}'>Detalle</a>

                        {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
                            <a class='btn btn-danger mb-4' href='eliminar/{$product->id}'>Eliminar</a>
                            <a class='btn btn-secondary mb-4' href='update/{$product->id}'>Editar</a>
                        {/if}

                    </div>

                </div>
            </div>
        </div>       
    </div>    
    {/foreach}
    
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    {if $start<=0} 
        <li class="page-item"><a class="page-link" aria-disabled="true" href="#">Previous</a></li>
    {else} 
        <li class="page-item"><a class="page-link" href="home/{$start-3}">Anterior</a></li> 
    {/if}      
        <li class="page-item"><a class="page-link">{floor(($start/2)+1)}</a></li>
        <li class="page-item"><a class="page-link" href="home/{$start+3}">Siguiente</a></li>
  </ul>
</nav>
     

    {include 'footer.tpl'}

</main>
</body>
</html>