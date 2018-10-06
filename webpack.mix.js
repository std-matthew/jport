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

mix.sass('resources/sass/app.scss', 'public/css/app.css').version();
mix.sass('resources/sass/vendors.scss', 'public/css/vendors.css').version();
mix.sass('resources/sass/backend/auth.scss', 'public/css/backend/auth.css').version();

mix.js(['resources/js/backend/app.js'], 'public/js/backend/app.js').version();

mix.js([
	'resources/js/app.js',
], 'public/js/app.js')
	.extract([
		'vue', 'axios'
	])
    .version();