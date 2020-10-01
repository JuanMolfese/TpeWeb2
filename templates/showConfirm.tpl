<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Tech</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

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