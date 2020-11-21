<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Tech</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--Get your code at fontawesome.com-->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
</head>
<body>
    
<header class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-secondary mb-2 py-3">
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between p-0" id="navbarNav">

            <ul class="navbar-nav col-auto p-0">

                <div class="d-flex flex-md-row flex-column col-auto justify-content-start ml-3 p-0">
                    
                    <div class="text-white d-flex align-items-center">
                        <h3>New Tech</h3>
                    </div>
                    
                    <li class="nav-item mx-md-4 p-0">
                        <a class="nav-link btn btn-secondary text-white" name='home' href='home'> <i class='fas fa-home'></i> Home</a>
                    </li>

                    <div class="dropdown text-center">

                        <button class="btn btn-secondary dropdown-toggle p-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorias
                        </button>
                        
                        {*Muestra la lista actualizada contra la db de categorias*}
                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                                
                            {foreach from=$categorys item=category}
                                <a class="dropdown-item" href='filtrar/{$category->id}'>{$category->nombre}</a>
                            {/foreach} 
                            
                            {if isset($smarty.session.ADMIN)}
                                <a class="dropdown-item" href='adminProd'>Ver Todo</a>
                            {else}   
                                <a class="dropdown-item" href='allProd'>Ver Todo</a>
                            {/if}     

                        </div>

                    </div>

                </div>
            </ul> 

            <ul class="navbar-nav col-auto p-0"> 
            
                <div class="d-flex flex-md-row flex-column col-auto justify-content-end p-0">
                    <li>
                        {*Muestra u oculta dropdown en funcion a si se esta logueado o no*}
                        <div class="dropdown text-center col-md-1">
                            {if isset($smarty.session.ID_USER)&&($smarty.session.ADMIN)}
                                <button class="btn btn-secondary dropdown-toggle p-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='fas fa-cogs'></i> Administrar </button>
                                <div class="dropdown-menu  text-center" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href='adminProd'>Productos</a>
                                    <a class="dropdown-item" href='verCategorias'>Categorias</a>
                                     <a class="dropdown-item" href='verUsuarios'>Usuarios</a>                        
                                </div>
                            {/if}
                        </div>
                    </li>
                    
                    {*Muestra u oculta botones de login/logout en funcion a si se esta logueado o no*}
                    {if !isset($smarty.session.ID_USER)}
                    <li class="nav-item dropdown">
                        <a class="nav-link btn btn-secondary text-white mx-md-3" href='login'><i class='fas fa-user-alt'></i> Login</a>
                    </li>
                    {else}
                    <li class="nav-item dropdown">
                        <a class="nav-link btn btn-secondary text-white mx-md-3" href='logout'>Logout</a>
                    </li>
                    {/if}
                    {if !isset($smarty.session.ID_USER)}
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary text-white mx-md-3" href='register'><i class='fas fa-user-plus'></i> Registrarse</a>
                    </li>
                    {else}
                    <li class="d-flex align-items-center"> <span class="text-white font-weight-bold">{$smarty.session.EMAIL_USER}</span> </li>
                    {/if}
                </div>

            </ul>

        </div>
    </nav>

</header>