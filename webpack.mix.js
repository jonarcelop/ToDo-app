
const mix = require('laravel-mix');
require('laravel-mix-vue3'); // Asegúrate de tener este paquete instalado

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css') // Si tienes archivos SCSS
    .vite({
        input: ['resources/css/app.css', 'resources/js/app.js'],
        refresh: true,
    });
