    {include 'header.tpl'}

    <main class="container">

        <table class="table table-striped my-5">
            <thead>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>DESCRIPCION</td>
               
            {foreach from=$category item=cat}
                <tr>
                <td>{$cat->id}</td>
                <td>{$cat->nombre}</td>
                <td>{$cat->descripcion}</td>
                <td><a class='btn btn-danger btn-sm' href='eliminarCategoria/{$cat->id}'>ELIMINAR</a></td>
                <td><a class='btn btn-primary btn-sm' href='updateCat/{$cat->id}'>EDITAR</a></td>
                </tr>
            {/foreach}
        </table>

        {include 'footer.tpl'}

    </main>
</body>
</html>