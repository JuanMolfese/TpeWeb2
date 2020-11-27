{if {$origin} == 'noLogin' || {$origin} == 'addcom'}
{include 'header.tpl'}
{/if}
    <main class="container">

        <div class="modal fade show" id="staticBackdropLive" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" style="display: block; padding-right: 17px;" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="staticBackdropLiveLabel">Error !</h5>
                    </div>
                    <div class="modal-body text-center">
                        <p>{$msg}</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                     {*segun accion que lo genera, se redirecciona al cerrar el modal*}
                    {if {$origin} == "add"}
                        <a href="insertar" class="btn btn-danger"> Cerrar </a>
                    {elseif {$origin} == "addcat"}
                        <a href="insertarCategoria" class="btn btn-danger"> Cerrar </a>
                    {elseif {$origin} == "delcat"}
                        <a href="verCategorias" class="btn btn-danger"> Cerrar </a> 
                    {elseif {$origin} == "noLogin"}
                        <a href="login" class="btn btn-danger"> Cerrar </a>    
                    {else}
                        <a href="home" class="btn btn-danger"> Cerrar </a>
                    {/if}
                    </div>
                </div>
            </div>
        </div>

    </main> 

  </body>
</html>