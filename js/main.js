document.addEventListener('DOMContentLoaded', iniciaPagina);
"use strict";

function iniciaPagina() {

    const capsMessage = document.querySelector('#caps-message');

    window.addEventListener('keyup', event => {
        if (event.getModifierState('CapsLock')) {
            capsMessage.style.display = 'flex';
        } else {
            capsMessage.style.display = 'none';
        }
    });

}