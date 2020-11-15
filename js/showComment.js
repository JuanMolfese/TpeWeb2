"use strict"

const app = new Vue({
    el: "#app",
    data: {
        commentsList: [],
        admin: 0,
        promedio: 0,
    },
});

document.addEventListener('DOMContentLoaded', e => {
    const id = document.querySelector("#id_product");
    app.admin = document.querySelector("#useradmin").value;
    getComments(id.value);
});

async function getComments(id) {

    try {
        const r = await fetch(`api/comment/${id}`);
        const comments = await r.json();
        console.log(comments);
        app.commentsList = comments;
        app.promedio = calcProm(comments);

    } catch (e) {
        console.log(e);
    }
}

function calcProm(array) {
    let sum = 0;

    array.forEach(element => {
        sum = sum + parseInt(element.puntaje);
    });

    let promedio = parseFloat(sum / array.length);
    return promedio.toFixed(2); //retorno promedio formateado con dos decimales
}