let mix = require('laravel-mix');

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

mix.setPublicPath(path.resolve('./'));
mix.sass('assets/src/sass/vendor.scss', 'assets/dist/vendor.css')
mix.sass('assets/src/sass/app.scss', 'assets/dist/app.css');
mix.js('assets/src/js/app.js', 'assets/dist').extract(['leaflet', 'mobius1-selectr']);
mix.copyDirectory('assets/src/img', 'assets/dist/img');
mix.copyDirectory('assets/src/fonts/', 'assets/dist/fonts');
mix.version();
mix.browserSync({
  proxy: 'https://connectedkingston.test',
  https: true,
  files: [
    'assets/dist/app.css',  // Generated .css file
    'assets/dist/app.js',    // Generated .js file
    'templates/**/*.+(html|twig)',
    'craft/templates/**/*.+(html|twig)',
    'index.php'
  ]
});
