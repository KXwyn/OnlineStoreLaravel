const mix = require('laravel-mix');

// Compila nuestros archivos JS y CSS principales
mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css');

// --- CORRECCIÓN ---
// Copia solo los archivos principales de AdminLTE desde la carpeta 'dist'
mix.copyDirectory('node_modules/admin-lte/dist', 'public/vendor/adminlte/dist');
