{include 'header.tpl'}

<div class="container">
       
<h4> Comentarios del producto </h4>       
<h3 class="font-weight-bold">{$product->nombre}</h3>
<h5>Valoracion promedio: {$prom|string_format:"%.2f"}</h5>
<div class="d-flex columns my-5">
        <div class="ml-5">
            {foreach from=$list item=comment}
                
                <div>
                    {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
                    ID: {$comment->id}
                    {/if}
                </div>
                <div>
                    Usuario: {$comment->email} 
                </div>
                <div>
                    Valoracion: {$comment->puntaje}
                </div>
                <div>
                    Comentario: {$comment->comentario}
                </div>
                <div>
                    {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
                    <a class='btn btn-danger btn-sm' href='deleteComment/{$comment->id}/{$product->id}'>Eliminar</a>
                    {/if}
                </div>
                <br>
            {/foreach}
        </div>

    </div>
    <div class="text-center">
        <a href="details/{$comment->id_producto}" class='btn btn-secondary'>Volver</a>
    </div>
</div>