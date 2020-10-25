 {include 'header.tpl'}

    <main class="container">

        <table class="table table-striped my-5">
           
            <thead>
                <th>ID</th>
                <th>EMAIL</th>
                <th>ADMIN</th>
            </thead> 

            {*genera fila de tabla con datos de categoria y botones*}
            {foreach from=$users item=user}
                <tr>
                <td>{$user->id}</td>
                <td>{$user->email}</td>
                <td>{$user->admin}</td>
                <td><a class='btn btn-danger btn-sm' href='deleteUser/{$user->id}'>ELIMINAR</a></td>
                <td><a class='btn btn-secondary btn-sm' href='updateUser/{$user->id}'>EDITAR</a></td>
                </tr>
            {/foreach}
        </table>

        {include 'footer.tpl'}

    </main>
</body>
</html>