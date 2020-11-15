{literal}
<section id="app" class="col-12">
    <h4> Comentarios del producto </h4>
    <br> <!--Charlar con Juan si queda mejor el nombre del producto al lado del h4-->
    <h4 class="font-weight-bold">{{commentsList[0].nombre}}</h4>
    <h5>Puntuacion promedio: {{promedio}}</h5>
    <h1 v-if="commentsList[0].comentario==null">No hay comentarios</h1>
     <ul v-else class="row list-group mt-5">
         <li v-for="comment in commentsList" class="list-group-item d-flex justify-content-between">
            <div class="font-italic" v-if="admin == 1">Id: {{ comment.id }}</div>
            <div class="font-italic ml-1">Usuario: <span class="text-primary font-weight-bolder">{{ comment.email }}</span></div>
            <div class="font-italic text-capitalize text-break flex-grow-1 ml-2">Comentario: {{ comment.comentario }}</div>
            <div class="font-italic">Puntaje: {{ comment.puntaje }}</div>
            <button class="btn btn-danger ml-3 " v-if="admin == 1">Eliminar</button>
        </li>
    </ul>
</section>
{/literal}