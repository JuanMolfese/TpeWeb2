document.addEventListener('DOMContentLoaded', iniciaPagina);
"use strict";

function iniciaPagina() {

    const capsMessage = document.querySelector('#caps-message');
    capsMessage.style.visibility = 'hidden';

    window.addEventListener('keydown', e => {
        if (e.getModifierState('CapsLock')) {
            capsMessage.style.visibility = 'visible';


        } else {
            capsMessage.style.visibility = 'hidden';

        }
    });

}