{literal}
<section id="app">
    <h4> Comentarios del producto </h4>
    <h3 class="font-weight-bold">{{commentsList.nombre}}</h3>
    <ul class="list-group mt-5">
        <li v-for="comment in commentsList" class="list-group-item d-flex justify-content-between">
            ID Comentario: {{ comment.id }} , Comentario: {{ comment.comentario }} Puntaje, {{ comment.puntaje }}
            <button v-if="admin == 1">Eliminar</button>
        </li>
    </ul>
</section>
{/literal}