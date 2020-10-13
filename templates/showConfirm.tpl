    <main class="container">

        <div class="modal fade show" id="staticBackdropLive" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" style="display: block; padding-right: 17px;" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="staticBackdropLiveLabel">New tech</h5>
                    </div>
                    <div class="modal-body text-center">
                        <p>{$msg}</p>
                    </div>
                    <div class="modal-footer">
                        {if {$origin} == "add"}
                            <a href="insertar" class="btn btn-primary"> Cerrar </a>
                            {elseif {$origin} == "addcat"}
                                <a href="insertarCategoria" class="btn btn-primary"> Cerrar </a>
                            {elseif {$origin} == "delcat"}
                                <a href="verCategorias" class="btn btn-primary"> Cerrar </a>
                            {elseif {$origin} == "del"}
                                <a href="allProd" class="btn btn-primary"> Cerrar </a>
                            {else}
                                <a href="home" class="btn btn-primary"> Cerrar </a>
                        {/if}
                        
                    </div>
                </div>
            </div>
        </div>
    
    </main> 

</body>
</html>