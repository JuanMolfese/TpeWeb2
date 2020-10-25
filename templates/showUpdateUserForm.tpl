{include 'header.tpl'}

    <main class="container">

        <h3 class='mb-4'>Actualizar usuario</h3>
        <form id='form-add' action='recordUser' method='POST'>
            <div class='d-flex row'>

                <div class='form-group pt-6 col-md-7 p-0'>
                    <label for='input_product_name'>Usuario</label>
                    <input name='user' type='text' value="{$user->email}" class='form-control' id='input_category_name' maxlength='30' required>
                </div>

                <div class='form-group col-md-3 p-0 mt-4 ml-5 d-flex justify-content-around'>
                    <label class='d-flex align-items-center mb-0' for='input_admin_user'>Admin?</label>
                    <div class='form-check form-check-inline' id='input_admin_user'>
                        <input class='form-check-input' type='radio' name='admin' id='inlineRadio1' value='0' checked>
                        <label class='form-check-label' for='inlineRadio1'>No</label>
                    </div>
                    <div class='form-check form-check-inline'>
                        <input class='form-check-input' type='radio' name='admin' id='inlineRadio2' value='1'>
                        <label class='form-check-label' for='inlineRadio2'>Si</label>
                    </div>
                </div>
                <input type='hidden' value={$user->id} name='idUser'>
                <input type='hidden' value={$user->password} name='passUser'>

                <div class='form-group m-auto col-md-10 d-flex justify-content-around pt-5'>
                    <button type='submit' id='btn-guardar' class='btn btn-info btn-lg'>Guardar</button>
                </div>

            </div>

        </form>

        {include 'footer.tpl'}

    </main> 

</body>
</html>