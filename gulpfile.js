var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

   mix.styles([
       'bootstrap.min.css',
       'font-awesone.min.css',
       'prettyPhoto.css',
       'animate.css',
       'main.css',
       'responsive.css',
       ],'public/css/all.css');

    mix.scripts([
        'jquery.js',
        'bootstrap.min.js',
        'jquery.scrollUp.mim.js',
        'price-range.js',
        'contact.js',
        'main.js',
        'jquery.prettyPhoto.js',
        'main.js',

    ],'public/js/all.js');

    mix.version(['css/all.css', 'js/all.js']);

    mix.copy('resources/assets/fonts','public/build/fonts');

});
