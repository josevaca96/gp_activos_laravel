const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


// mix.styles([
//     'public/css/app.css',
//     'public/css/venta.css',
//     'public/css/bootstrap.min.css',
//     'public/css/fontawesome.min.css',
//     'public/css/datepicker3.css',
//     'public/css/styles.css',
//     'public/css/jquery-ui.min.css'    
// ], 'public/css/all.css')
// .js('resources/js/app.js', 'public/js')
// .scripts([
//     'public/js/jquery.js',
//     'public/js/jquery-ui.min.js'
// ],'public/js/all.js');