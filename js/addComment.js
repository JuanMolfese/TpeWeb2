"use strict"

document.addEventListener('DOMContentLoaded', initpage());

function initpage() {

    let form_Comment = document.querySelector("#form-add-comment");
    let idProduct = document.querySelector("#id_product");
    let idUser = document.querySelector("#user_id");
    let select_score = document.querySelector("#js-select-score");
    let input_comment = document.querySelector("#input-product-comment");

    form_Comment.addEventListener("submit", function(event) {
        event.preventDefault();
        const comentario = {
            "comentario": input_comment.value,
            "puntaje": select_score.value,
            "id_producto": idProduct.value,
            "id_usuario": idUser.value
        }
        addComment(comentario);

    });


    async function addComment(comentario) {

        try {
            const r = await fetch('api/comment', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(comentario)
            });
            const json = await r.json();
            confirmAddComment();

        } catch (e) {
            console.log(e);
        }

    }

    function confirmAddComment() {

        document.getElementById("js-respuesta-addComment").innerHTML = "Su comentario ha sido ingresado";
        document.getElementById("form-add-comment").style.visibility = "hidden";
    }

}