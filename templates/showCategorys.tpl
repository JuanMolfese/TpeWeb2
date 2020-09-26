<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Tech</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

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
                <td><a class='btn btn-danger btn-sm' href='eliminar/{$cat->id}'>ELIMINAR</a></td>
                <td><a class='btn btn-primary btn-sm' href='update/{$cat->id}'>EDITAR</a></td>
                </tr>
            {/foreach}
        </table>

        {include 'footer.tpl'}

    </main>
</body>
</html>