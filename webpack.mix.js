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

mix.autoload({
  jquery: ['$', 'jQuery', 'jquery']
});

mix.copy('resources/assets/img/sidebar-*.jpg', 'public/images');
mix.js('resources/assets/js/auth.js', 'public/js')
   .sass('resources/assets/sass/auth.scss', 'public/css');
mix.js('resources/assets/js/light-bootstrap-dashboard.js', 'public/js')
   .sass('resources/assets/sass/light-bootstrap-dashboard.scss', 'public/css');
mix.extract([
  'lodash',
  'chartist',
  'jquery',
  'popper.js',
  'bootstrap',
  'bootstrap-sass',
  'bootstrap-notify',
  'bootstrap-select',
  'bootstrap-switch',
  'flatui-radiocheck',
  'vue',
  'axios'
], 'public/js/vendor.js');
mix.version();
