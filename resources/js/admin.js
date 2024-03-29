import './bootstrap';

import tippy, {animateFill} from "tippy.js";

tippy('.tippy', {
    placement: 'top',
    inertia: true,
    theme: 'tippy',
});

tippy.setDefaultProps({
    delay: 50,
    plugins: [
        animateFill
    ]
});
