{if {$origin} != 'addUser'}
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
                <div class="modal-footer text-center">
                    
                        <a href="login" class="btn btn-primary"> Cerrar </a>                   
                   
                </div>
            </div>
        </div>
    </div>

</main> 

</body>
</html>