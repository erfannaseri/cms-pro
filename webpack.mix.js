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


mix.styles([
    'resources/css/lib/bootstrap/css/bootstrap.min.css',
    'resources/css/lib/animate/animate.min.css',
    'resources/css/lib/ionicons/css/ionicons.min.css',
    'resources/css/lib/owlcarousel/assets/owl.carousel.min.css',
    'resources/css/lib/lightbox/css/lightbox.min.css',
    'resources/css/css/style.css',
],'public/front/css/front-css.css');
mix.scripts([
    'resources/js/lib/jquery/jquery.min.js',
    'resources/js/lib/jquery/jquery-migrate.min.js',
    'resources/js/lib/bootstrap/js/bootstrap.bundle.min.js',
    'resources/js/lib//easing/easing.min.js',
    'resources/js/lib/mobile-nav/mobile-nav.js',
    'resources/js/lib/wow/wow.min.js',
    'resources/js/lib/waypoints/waypoints.min.js',
    'resources/js/lib/counterup/counterup.min.js',
    'resources/js/lib/owlcarousel/owl.carousel.min.js',
    'resources/js/lib/isotope/isotope.pkgd.min.js',
    'resources/js/lib/lightbox/js/lightbox.min.js',
    'resources/js/contactform/contactform.js',
    'resource/js/js/main.js',
], 'public/front/js/front-js.js');
