import './bootstrap';
import Echo from 'laravel-echo';
import Reverb from 'laravel-reverb';

window.Echo = new Echo({
    broadcaster: 'reverb',
    reverb: new Reverb(window.location.hostname + ':8080'), // Ajusta el puerto si es necesario
});