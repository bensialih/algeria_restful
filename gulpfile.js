var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix){
    
    mix.sass('app.scss');
    mix.scripts('app.js', 'public/js/app.js');
    mix.styles(['basic_styling.css', 'app.css'], 'public/css/token.css');

    mix.version(['public/js/app.js', 'public/css/token.css']);

    //mix.styles();

// mix.styles(['basic_styling.css', 'app.css']);
    // .scripts('resources/assets/css/app.js');
});

elixir(function(mix){
    //mix.version('public/js/app.js');
});