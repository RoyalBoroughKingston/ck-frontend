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

mix
  .setPublicPath('public')
  .sass('assets/src/sass/vendor.scss', 'public/assets/dist/vendor.css')
  .sass('assets/src/sass/print.scss', 'public/assets/dist/print.css')
  .sass('assets/src/sass/app.scss', 'public/assets/dist/app.css')
  .js('assets/src/js/app.js', 'public/assets/dist')
  .extract(['@babel/polyfill', 'axios', 'vue', 'leaflet', 'clipboard', 'moment', 'showdown', 'vue-media-embed', 'vuex'])
  .copy('assets/src/img', 'public/assets/dist/img')
  .options({
    fileLoaderDirs: {
      images: 'public/assets/dist/img'
    }
  })
  .copy('assets/src/fonts/', 'public/assets/dist/fonts')
  .options({
    fileLoaderDirs: {
      fonts: 'public/assets/dist/fonts'
    }
  })
  .version()
  .sourceMaps()
  .browserSync({
    proxy: 'http://ck-frontend.test',
    https: true,
    files: [
      'public/assets/dist/app.css',  // Generated .css file
      'public/assets/dist/app.js',    // Generated .js file
      'public/templates/**/*.+(html|twig|php)',
      'public/index.php'
    ]
  });
