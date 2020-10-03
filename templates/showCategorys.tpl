    {include 'header.tpl'}

    <main class="container">

        <table class="table table-striped my-5">
           
            <thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>ACCIONES</th>
                <th> <a href="insertarCategoria" class='btn btn-primary font-italic'> Agregar Categoria </a> </th>
            </thead> 
            {foreach from=$category item=cat}
                <tr>
                <td>{$cat->id}</td>
                <td>{$cat->nombre}</td>
                <td>{$cat->descripcion}</td>
                <td><a class='btn btn-danger btn-sm' href='eliminarCategoria/{$cat->id}'>ELIMINAR</a></td>
                <td><a class='btn btn-secondary btn-sm' href='updateCat/{$cat->id}'>EDITAR</a></td>
                </tr>
            {/foreach}
        </table>

        {include 'footer.tpl'}

    </main>
</body>
</html>