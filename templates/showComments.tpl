<div class="container">
    
   
        <table class="table table-striped my-5">
            <thead>
               <th>Comentarios</th>
               <th>Valoracion</th>
            </thead>
        
           
          {*   {foreach from=$products item=product}
                <tr>
                {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
                <td>{$product->id}</td>
                {/if}
                <td>{$product->nombre}</td>
                {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
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
                {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
                <td><a class='btn btn-danger btn-sm' href='eliminar/{$product->id}'>Eliminar</a></td>
                <td><a class='btn btn-secondary btn-sm' href='update/{$product->id}'>Editar</a></td>
                {/if}
                </tr>
            {/foreach} *}
        </table>
</div>