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
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'resources/css/magnific-popup.css',
        'resources/css/font-awesome.css',
        'resources/css/themify-icons.css',
        'resources/css/nice-select.css',
        'resources/css/animate.css',
        'resources/css/flex-slider.min.css',
        'resources/css/owl-carousel.css',
        'resources/css/slicknav.min.css',
        'resources/css/animate.css',
        'resources/css/reset.css',
        'resources/css/style.css',
        'resources/css/responsive.css',
        'resources/css/color/color1.css',
        'resources/css/testing.css',
    ], 'public/css/something.css')
    .sourceMaps();
