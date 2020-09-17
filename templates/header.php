<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=BASE_URL?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Tech</title>
    <!--<link rel="icon" href="img/logonewtech.png" type="image/png"> invocamos Logo de la pagina para cuando almacenemos imgs-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>

    <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <!-- <a class="navbar-brand" href="#"> <img src="img/logo_nt2.png" alt="Logo New tech"> </a> -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <!-- NUEVO  -->
                            <a class="nav-link" href="#" data-toggle="collapse" data-target="#MenuRegistro" aria-controls="MenuRegistro" aria-expanded="false"> Login </a>

                            <div class="form-row collapse dropdown-menu border-0 bg-light " id="MenuRegistro">

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom10">Usuario</label>
                                    <input type="text" class="form-control" id="validationCustom01" maxlength="12" required>

                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom11">Contraseña</label>
                                    <input type="password" class="form-control" id="validationCustom02" maxlength="6" required>

                                </div>
                                <button class="btn btn-primary ml-2" type="submit">Ingresar</button>
                            </div>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="btn-menu-login">Registrarse</a>
                        </li>

                        <!-- NUEVO  -->

                        <li class="nav-item">
                            <a class="nav-link" >Celulares</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >Notebooks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Tablets</a>
                        </li>
                      

                    </ul>

                </div>

            </nav>

        </header>