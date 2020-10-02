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

<header class="container p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary mb-md-4">
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav col-md-12 p-0">

                <div class="d-flex flex-md-row flex-column col-md-8 justify-content-start p-0 ml-md-3">
                    
                    <div class="text-white d-flex align-items-center">
                        <h3>New Tech</h3>
                    </div>
                    
                    <li class="nav-item mx-md-4 p-0">
                        <a class="nav-link btn btn-secondary text-white" name='home' href='home'>Home</a>
                    </li>

                    <div class="dropdown text-center">
                        <button class="btn btn-secondary dropdown-toggle p-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href='filtrar/3'>Celulares</a>
                            <a class="dropdown-item" href='filtrar/1'>Notebooks</a>
                            <a class="dropdown-item" href='filtrar/2'>Tablets</a>
                        </div>
                    </div>
                    
                </div>
                
                <div class="d-flex flex-md-row flex-column col-md-4 justify-content-md-end p-0">
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link btn btn-secondary text-white mx-md-3" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary text-white mx-md-3" href='#'>Registrarse</a>
                    </li>
                </div>

            </ul>

        </div>
    </nav>

</header>