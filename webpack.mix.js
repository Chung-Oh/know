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

mix.js('resources/js/**/*.js', 'public/js')
	.sass('resources/sass/app.scss', 'public/css')
	// .extract() // Here extracting all librarys like manifest and vendor(your dependencys)
	.version(); // This line create hash each modification, this is good because cache clean when modificated
