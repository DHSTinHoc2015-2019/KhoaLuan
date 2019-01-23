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
//     'resources/assets/css/animate-css/animate.css',
//     'resources/assets/css/home/style.css',
//     'resources/assets/css/home/blog.css',
//     'resources/assets/css/home/discussion.css',
//     'resources/assets/css/home/intro.css',
//     'resources/assets/css/admin/style.css',
//     'resources/assets/font-awesome/css/font-awesome.css',
// ], 'public/css/all.css');
