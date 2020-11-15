{include 'header.tpl'}

<main class="container">

    <h3 class="mb-4">Crear un comentario</h3>
    <form id="form-add-comment" autocomplete="off">
        
        <div class="row col-12">
            
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

                <input type='number' id="id_product" value="{$product_id}" hidden> {* Para pasar a JS el id de producto *}

                <div class="form-group col-9 p-0 mt-2 ml-5">
                    <label for="input_product_comment">Comentario</label>
                    <textarea name="comentario" type="text" class="form-control" id="input_product_comment" maxlength="250" rows="3" required></textarea>
                </div>

            </div>
        
            <div class="form-group m-auto col-md-10 d-flex justify-content-around py-5">
                {* <button type="submit" id="btn-cargar" class="btn btn-primary btn-lg">Cargar</button> *}
                <button id="btn-add-comment" type="submit" class="btn btn-primary btn-lg">Cargar</button>
                <a href="details/{$product_id}" class='btn btn-secondary btn-lg'>Volver</a>
            </div>

        </div> 

    </form>

    <h4 id="contenedor_agregar_comentario"></h4>
    
    <script src="js/addComment.js"></script>
    {include 'footer.tpl'}    

</main>  
    

</body>
</html>