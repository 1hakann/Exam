const mix = require('laravel-mix');
const $AdminResAs = 'resources/assets/adminn';
const $AdminPubAs = 'public/adminn';

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
mix.copy('resources/assets/adminn/images','public/adminn/img');
mix.copy('resources/assets/adminn/vendors/bootstrap-icons/bootstrap-icons.svg','public/adminn/vendors/bootstrap-icons/bootstrap-icons.svg');


mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])

.combine([
    $AdminResAs+'/vendors/perfect-scrollbar/perfect-scrollbar.min.js',
    $AdminResAs+'/js/bootstrap.bundle.min.js',
    $AdminResAs+'/vendors/apexcharts/apexcharts.js',
    $AdminResAs+'/js/pages/dashboard.js',
    $AdminResAs+'/js/main.js',
], $AdminPubAs+'/js/maze-admin.js')


.styles([
    $AdminResAs+'/css/bootstrap.css',
    $AdminResAs+'/vendors/perfect-scrollbar/perfect-scrollbar.css',
    $AdminResAs+'/css/app.css',
], $AdminPubAs+'/css/maze-admin.css')

.sourceMaps();
mix.version()
    .browserSync('http://localhost:8000');




if (mix.inProduction()) {
    mix.version();
}
