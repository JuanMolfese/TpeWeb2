{include 'header.tpl'}

<div class="container">
       

{* <h3 class="font-weight-bold">{$product->nombre}</h3> *}
{* <h5>Valoracion promedio: {$prom|string_format:"%.2f"}</h5> *}

{* {include file="vue/commentHeader.vue"} *}
<input type="hidden" id="id_product" value={$product->id}></input>
{if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
    <input type="hidden" id="useradmin" value="1"></input>
{else}
    <input type="hidden" id="useradmin" value="0"></input>
{/if}

    <div class="d-flex columns my-5">

        <div class="ml-5">
            {include file="vue/commentList.vue"}           
        </div>

    </div>

    <div class="text-center mb-5">
        <a href="details/{$product->id}" class='btn btn-secondary'>Volver</a>
    </div>

    <script src="js/showComment.js"></script>
    {include 'footer.tpl'}    
</div>