const mix = require('laravel-mix');
require('laravel-mix-purgecss');
require('babel-plugin-prismjs');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .purgeCss()
    .browserSync({
        host: "192.168.1.19",
        proxy: process.env.APP_URL,
        files: "content/**/*",
        open: false
    })
    .disableNotifications();