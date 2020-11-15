"use strict"

/* let idProduct = document.querySelector("#id_product");
let idUser = document.querySelector("#id_user");
let form_Comment = document.querySelector("#form-add-comment");
let form_Detail = document.querySelector("#js-form-details");

let btn_showForm = document.querySelector("#btn-show-form");
let btn_listComment = document.querySelector("#btn-list-comment");
let btn_add_comment = document.querySelector("#btn-add-comment");
let input_radio_score = document.querySelectorAll("#radio-score-comment");
let input_comment = document.querySelector("#input_product_comment");
let contenedor = document.querySelector("#contenedor_agregar_comentario");

form_Comment.addEventListener("submit", function(event) {
    event.preventDefault();
});

form_Detail.addEventListener("submit", function(event) {
    event.preventDefault();
}); 

btn_listComment.addEventListener("click", function(e) {
    e.preventDefault();
    listComment(idProduct);
});

btn_add_comment.addEventListener("click", function(e) {
    e.preventDefault();
    let check = 0;
    for (i = 0; i <= 4; i++) {
        if (input_radio_score[i].checked) {
            check = i;
        }
    }

    comentario = {
        "comentario": input_comment.value,
        "puntaje": parseInt(input_radio_score[check].value, 10),
        "idProduct": idProduct.value,
        "idUser": idUser
    }
    addComment(comentario);
});

async function addComment(comentario) {
    try {
        let r = await fetch('api/comment', {
            "method": "POST",
            "headers": { "Content-Type": "application/json" },
            "data": JSON.stringify(comentario)
        })

        let json = await r.json();
        contenedor.innerHTML = JSON.stringify(json);
    } catch (e) {
        console.log(e);
    } 
} */