
require('./bootstrap');
import Alpine from 'alpinejs';
import tippy, { animateFill } from 'tippy.js';
import { Loader } from "@googlemaps/js-api-loader"
import 'tippy.js/animations/scale.css';
import Glide, { Controls, Breakpoints } from '@glidejs/glide/dist/glide.modular.esm'

window.Alpine = Alpine;
Alpine.start();

tippy('.nav-item', {
    placement: 'right',
    animation: 'scale',
    inertia: true,
    theme: 'navigation'
});

tippy('.glide__bullet', {
    placement: 'top',
    animation: 'scale',
    inertia: true,
    theme: 'top-services'
});

tippy.setDefaultProps({
    delay: 50,
    plugins: [
        animateFill
    ]
});

new Glide('.glide', {
    perView: 4,
    breakpoints: {
        1500: {
            perView: 3,
        },

        1200: {
            perView: 2,
        },
        767: {
            perView: 1,
        },
    },

}).mount({ Controls, Breakpoints })


var cards = document.querySelectorAll('.card');

[...cards].forEach((card) => {
    card.addEventListener('click', function () {
        card.classList.toggle('is-flipped');
    });
});
