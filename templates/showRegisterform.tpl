{include 'header.tpl'}

    <main class="container">

        <h3 class='mb-4'>Registro de usuario</h3>
        
        <form id='form-add' action='register' method='POST'>
            <div class='row'>
                <div class="col-12 flex-column">
                    <div class='form-group col-md-4 mx-auto '>
                        <label for='input_product_name'>Email</label>
                        <input name='email' type='email' class='form-control' id='input_category_name' maxlength='30' required>
                    </div>

                    <div class='form-group col-md-3 mt-4 p-0 mx-auto '>
                        <label for='input_product_description'>Password</label>
                        <input name='password' type='password' class='form-control' id='input_category_description' maxlength='50' required>
                    </div>

                    <div class='form-group col-md-3 mt-4 mx-auto p-0'>
                        <label for='input_product_description'>Reingrese Password</label>
                        <input name='rePassword' type='password' class='form-control' id='input_category_description' maxlength='50' required>
                    </div>
                </div>

                <div class='m-auto col-md-5 d-flex justify-content-around pt-5'>
                    <button type='submit' id='btn-registro' class='btn btn-info btn-lg'>Registrarse</button>
                    <a href="home" class='btn btn-secondary btn-lg'>Volver</a>
                </div>
                
            </div>

        </form>

        {include 'footer.tpl'}

    </main> 

</body>
</html>