document.addEventListener('DOMContentLoaded', iniciaPagina);
"use strict";

function iniciaPagina() {

    const capsMessage = document.querySelector('#caps-message');
    capsMessage.style.display = 'none'

    window.addEventListener('keyup', e => {
        if (e.getModifierState('CapsLock')) {
            capsMessage.style.display = 'flex';
        } else {
            capsMessage.style.display = 'none';
        }
    });

}