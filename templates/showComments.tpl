{include 'header.tpl'}

<div class="container">       

    <input type="hidden" id="id_product" value={$product->id}></input>
    
    {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
        <input type="hidden" id="useradmin" value="1"></input>
    {else}
        <input type="hidden" id="useradmin" value="0"></input>
    {/if}

    <div class="d-flex ml-5 columns my-5">        
        {include file="vue/commentList.vue"}           
    </div>

    <div class="text-center mb-5">
        <a href="details/{$product->id}" class='btn btn-secondary'><i class='fas fa-reply'></i> Volver</a>
    </div>

    <script src="js/showComment.js"></script>
    {include 'footer.tpl'}    

</div>