<header class="container p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <!-- <a class="navbar-brand" href="#"> <img src="img/logo_nt2.png" alt="Logo New tech"> </a> -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav col-md-12 p-0">

                <div class="row col-md-8 justify-content-start p-0 ml-3">
                    <!-- NUEVO  -->
                    <li class="nav-item">
                        <a class="nav-link" name='home' href='home'>Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" name='3' href='filtrar/3'>Celulares</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" name='1' href='filtrar/1'>Notebooks</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" name='2' href='filtrar/2'>Tablets</a>
                    </li>
                </div>
                
                <div class="row col-md-4 justify-content-end p-0">
                    
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
                        <a class="nav-link" id="btn-menu-login" href='registro'>Registrarse</a>
                    </li>
                </div>

            </ul>

        </div>
    </nav>

</header>