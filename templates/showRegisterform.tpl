{include 'header.tpl'}

    <main class="container">

        <h3 class='mb-4'>Agregar usuario</h3>
        
        <form id='form-add' action='register' method='POST'>
            <div class='d-flex row m-auto'>

                <div class='form-group pt-6 col-md-2 p-0'>
                    <label for='input_product_name'>email</label>
                    <input name='email' type='email' class='form-control' id='input_category_name' maxlength='30' required>
                </div>

                <div class='form-group col-md-9 ml-4 p-0'>
                    <label for='input_product_description'>Password</label>
                    <input name='password' type='password' class='form-control' id='input_category_description' maxlength='50'>
                </div>

                <div class='form-group col-md-9 ml-4 p-0'>
                    <label for='input_product_description'>Reingrese Password</label>
                    <input name='rePassword' type='password' class='form-control' id='input_category_description' maxlength='50'>
                </div>

                <div class='form-group m-auto col-md-5 d-flex justify-content-around pt-5'>
                    <button type='submit' id='btn-registro' class='btn btn-info btn-lg'>Registrarse</button>
                    <a href="home" class='btn btn-secondary btn-lg'>Volver</a>
                </div>
                
            </div>

        </form>

        {include 'footer.tpl'}

    </main> 

</body>
</html>