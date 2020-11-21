{include 'header.tpl'}

<main class="container">

    <h3 class="mb-4">Crear un comentario</h3>
    
    <div id="js-respuesta-addComment"></div>

    <form id="form-add-comment" autocomplete="off" class="m-auto col-md-12 d-flex justify-content-center py-5">
        
        <div class="row col-12 px-0">
            

            <div class="d-flex columns col-12">

                <div class="form-group pt-6 col-2 p-0 mt-2">
                                            
                    <label for="js-select-score">Puntaje</label>                       
                    <select class="custom-select" id="js-select-score">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5" selected>5</option>
                    </select>  

                </div>                  

                {* Espacio para tomar valores que seran usandos en js *}
                
                {if isset($smarty.session.ID_USER)}
                    <input type="hidden" id="user_id" value="{$smarty.session.ID_USER}"></input>                
                    <input type='number' id="id_product" value="{$product_id}" hidden></input>
                    <input type='number' id="id_user" value="{$smarty.session.ID_USER}" hidden></input>
                {/if}
                {* <div data-user-id="smarty.id_user" data-id-product="$product->id"></div> *}

                {* **************************************************** *}

                <div class="form-group col-9 p-0 mt-2 ml-5">
                    <label for="input_product_comment">Comentario</label>
                    <textarea name="comentario" type="text" class="form-control" id="input-product-comment" maxlength="250" rows="3" required></textarea>
                </div>
            </div>
            
            <div class="form-group m-auto col-md-12 d-flex justify-content-center py-5">                
                <button id="btn-add-comment" type="submit" class="btn btn-primary"><i class='fas fa-plus'></i> Cargar</button>
            </div>
                
        </div> 
    </form>    
        <div class="form-group m-auto col-md-12 d-flex justify-content-center pb-5">
            <a href="details/{$product_id}" class='btn btn-secondary'><i class='fas fa-reply'></i> Volver</a>
        </div>

    <div id="js-btn-back"></div>
    <script src="js/addComment.js"></script>
    {include 'footer.tpl'}    

</main>      

</body>
</html>