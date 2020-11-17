{literal}
<section id="app" class="col-12">
    <div class="row">
        <h4> Comentarios del producto </h4>
        <h4 class="font-weight-bold ml-2">{{commentsList[0].nombre}}</h4>
    </div>
    <h5 v-if="commentsList[0].puntaje != null">Puntuacion promedio: {{promedio}}</h5>
    <h4 v-if="commentsList[0].comentario == null" class="text-danger">No hay comentarios</h4>
    <ul v-else class="row list-group mt-5">
        <li v-for="comment in commentsList" class="list-group-item d-flex justify-content-between">
            <div class="font-italic" v-if="admin == 1">Id: {{ comment.id }}</div>
            <div class="font-italic ml-1">Usuario: <span class="text-primary font-weight-bolder">{{ comment.email }}</span></div>
            <div class="font-italic text-capitalize text-break flex-grow-1 ml-2">Comentario: {{ comment.comentario }}</div>
            <div class="font-italic">Puntaje: {{ comment.puntaje }}</div>
            <!-- ERROR para cargar el id del comentario -->
            <button class="btn btn-danger ml-3 " id="btn-delete-comment" v-if="admin == 1" v-on:click="deleteComment(comment.id, commentsList[0].id_producto)">Eliminar</button>


            <!-- ERROR para cargar el id del comentario -->
        </li>
    </ul>
</section>
{/literal}