"use strict"

document.addEventListener('DOMContentLoaded', initpage());

function initpage() {

    const app = new Vue({
        el: "#app",
        data: {
            commentsList: [],
            admin: 0,
            promedio: 0,
        },
        methods: {
            deleteComment: async function(comment_id, product_id) {

                try {
                    const r = await fetch(`api/comment/${comment_id}`, {
                        method: 'DELETE'
                    });
                    const json = await r.json();
                    if (r.ok) {
                        getComments(product_id);
                    }
                } catch (e) {
                    console.log(e);
                }
            }
        }

    });

    const id = document.querySelector("#id_product");
    app.admin = document.querySelector("#useradmin").value;
    getComments(id.value);

    async function getComments(id) {

        try {
            const r = await fetch(`api/comment/${id}`);
            const comments = await r.json();
            console.log(comments);
            app.commentsList = comments;
            if (comments[0].puntaje != null) {
                app.promedio = calcProm(comments);
            }

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

}