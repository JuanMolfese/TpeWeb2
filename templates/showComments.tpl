<div class="container">       

    <input type="hidden" id="id_product" value={$product->id}></input>
    
    {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
        <input type="hidden" id="useradmin" value="1"></input>
    {else}
        <input type="hidden" id="useradmin" value="0"></input>
    {/if}

    <div class="d-flex columns my-1">        
        {include file="vue/commentList.vue"}           
    </div>

    <script src="js/showComment.js"></script>

</div>