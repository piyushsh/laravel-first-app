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
    mix.less('app.less','resources/css');

    mix.styles([
        'app.css',
        'libs/style.css',
        'libs/select2.min.css'
    ]);

    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'select2.min.js'
    ],'public/js/output.js');

    //mix.version('public/css/all.css');

});
