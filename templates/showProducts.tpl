    {include 'header.tpl'}

    <main class="container">

        <table class="table table-striped my-5">
            <thead>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>DESCRIPCION</td>
                <td>PRECIO</td>
                <td>OFERTA</td>
                <td>CATEGORIA</td>
        
            {foreach from=$products item=product}
                <tr>
                <td>{$product->id}</td>
                <td>{$product->nombre}</td>
                <td>{$product->descripcion}</td>
                <td>{$product->precio}</td>
                <td>{$product->oferta}</td>
                <td>{$product->id_categoria}</td>
                <td><a class='btn btn-success btn-sm' href='details/{$product->id}'>Detalle</a></td>
                <td><a class='btn btn-danger btn-sm' href='eliminar/{$product->id}'>Eliminar</a></td>
                <td><a class='btn btn-primary btn-sm' href='update/{$product->id}'>Editar</a></td>
                </tr>
            {/foreach}
        </table>

        {include 'footer.tpl'}

    </main>
</body>
</html>