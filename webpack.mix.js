let mix = require('laravel-mix');

 mix.webpackConfig({
  resolve: {
    modules: ['node_modules'],
  },
})

mix.js('resources/assets/js/index.js', 'public/js')
   .sass('resources/assets/sass/index.scss', 'public/css');
