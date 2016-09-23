
var elixir = require('laravel-elixir');
var gulp = require('gulp');
var browserSync = require('browser-sync').create();


var paths = {
    'jquery': 'node_modules/jquery/dist',
    'underscore': 'node_modules/underscore',
    'bootstrap': 'node_modules/bootstrap/dist',
    'bootstrap_notify': 'node_modules/bootstrap-notify',
    'animate': 'node_modules/animate.css',
    'font_awesome': 'node_modules/font-awesome',
    'localResources' : '',
    'jquery_ui' : 'node_modules/jquery-ui-dist',
    'chart' : 'node_modules/chart.js/dist',
    'bootrap_social' : 'node_modules/bootstrap-social',
    'bootbox' : 'node_modules/bootbox'
}

elixir(function (mix) {

        mix.copy(paths.font_awesome + '/fonts', 'assets/build/fonts/')
            .copy(paths.bootstrap + '/fonts', 'assets/build/fonts/')
            .copy(paths.localResources + "/libs/jqueryui/images" , 'assets/build/src/images/')
            .scripts([
                paths.jquery + "/jquery.js",
                paths.bootstrap + "/js/bootstrap.min.js",
                paths.underscore + "/underscore-min.js",
                paths.bootstrap_notify + "/bootstrap-notify.min.js",
                paths.jquery_ui + "/jquery-ui.min.js",
                paths.chart + "/Chart.min.js",
                paths.bootbox  + '/bootbox.js'
            ], 'assets/build/src/orientame.js', './');

        mix.styles([
            paths.bootstrap + "/css/bootstrap.min.css",
            paths.font_awesome + "/css/font-awesome.min.css",
            paths.jquery_ui + "/jquery-ui.min.css",
            paths.bootrap_social + "/bootstrap-social.css",
            paths.animate + "/animate.min.css"
        ], 'assets/build/src/orientame.css', './')

        /*
         mix.scripts([
         paths.particles + "/particles.js"
         ], 'public/assets/all/all.js', './')
         mix.scripts([
         paths.lwz_async + "/lzw-async.min.js"
         ], 'public/assets/all/chat-all.js', './')*/
    }
);

gulp.task('js-watch', function () {
    browserSync.reload();
});


gulp.task('live', function () {
    console.log('Starting the live reload server');
    browserSync.init({
        proxy: 'dev.orientame.com'
    });

    gulp.watch("./assets/js/**/*.js", ['js-watch']);
    //gulp.watch("./resources/views/**/*.blade.php", ['js-watch']);
    gulp.watch("./view/**/*.php", ['js-watch']);
});


//gulp.task('default',['browser-sync']);


