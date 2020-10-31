{include 'header.tpl'}

<main class="container">

    <h3 class="mb-4">Crear un comentario</h3>
    <form id="form-add" action="addComment/{$product_id}" method="POST" autocomplete="off">
        
        <div class="row col-12">
            
            <div class="d-flex columns col-12">

                <div class="form-group pt-6 col-3 p-0">
                    <span>Puntaje</span>
                    <div class="mt-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="puntaje" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="puntaje" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="inlineRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="puntaje" id="inlineRadio3" value="3">
                            <label class="form-check-label" for="inlineRadio3">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="puntaje" id="inlineRadio3" value="4">
                            <label class="form-check-label" for="inlineRadio3">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="puntaje" id="inlineRadio3" value="5">
                            <label class="form-check-label" for="inlineRadio3">5</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group col-9 p-0 mt-2">
                    <label for="input_product_comment">Comentario</label>
                    <textarea name="comentario" type="text" class="form-control" id="input_product_comment" maxlength="250" rows="3" required></textarea>
                </div>

            </div>
        
            <div class="form-group m-auto col-md-10 d-flex justify-content-around py-5">
                <button type="submit" id="btn-cargar" class="btn btn-primary btn-lg">Cargar</button>
                <a href="details/{$product_id}" class='btn btn-secondary btn-lg'>Volver</a>
            </div>

        </div> 

    </form>

</main>  
    
    {include 'footer.tpl'}    

</body>
</html>