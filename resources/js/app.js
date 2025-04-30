import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.search = function(event, inputElement, url) {
    if (event.key === 'Enter') {
        const query = inputElement.value;
        const request = `${url}?search=${encodeURIComponent(query)}`;
        console.log(request);
        window.location.href = request;
    }
};
