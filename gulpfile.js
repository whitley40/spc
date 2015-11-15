var gulp = require('gulp'),
sass = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer'),
minifycss = require('gulp-minify-css'),
uglify = require('gulp-uglify'),
rename = require('gulp-rename'),
concat = require('gulp-concat'),
maps = require('gulp-sourcemaps'),
mamp = require('gulp-mamp'),
mozjpeg = require('imagemin-mozjpeg'), //jpeg optimiser
browsersync = require('browser-sync').create(),
del = require('del');

/* compiling the sass (with maps) */

gulp.task('compileSass', function() {
    return gulp.src('src/scss/styles.scss')
    .pipe(sass())
    .pipe(rename('style.css'))
    .pipe(gulp.dest('../wp-content/themes/spc-theme/'));
});


/* autoprefix the css */

gulp.task('addPrefix', ['compileSass'], function() {
    return gulp.src('../wp-content/themes/spc-theme/style.css')
    .pipe(autoprefixer())
    //.pipe(minifycss()); 
    .pipe(gulp.dest('../wp-content/themes/spc-theme/'));
});

/* concat the javascripts */

gulp.task("concatScripts", function(){
    return gulp.src(['src/js/**/*.js'])
    .pipe(concat("functions.js"))
    .pipe(gulp.dest('../wp-content/themes/spc-theme/js'));
});


/* minify javascript once its been through concat */

gulp.task("minifyScripts", ["concatScripts"],  function(){
    return gulp.src("../wp-content/themes/spc-theme/js/app.js")
    .pipe(uglify())
    .pipe(rename('app.js'))
    .pipe(gulp.dest('../wp-content/themes/spc-theme/js'));
});

/* move images across */

gulp.task('moveImgs', function() {
    return gulp.src('src/imgs/**/*.*')
    //.pipe(mozjpeg({quality: '75'})())
    .pipe(gulp.dest('../wp-content/themes/spc-theme/imgs'));
});

/* move any new css across */

gulp.task('moveCss', function() {
    return gulp.src('src/*.css')
    .pipe(gulp.dest('../wp-content/themes/spc-theme/'));
});

/* move fonts across */

gulp.task('moveFonts', function() {
    return gulp.src('src/fonts/**')
    .pipe(gulp.dest('../wp-content/themes/spc-theme/fonts'));
});

/* move videos across */

gulp.task('moveVids', function() {
    return gulp.src('src/vids/**')
    .pipe(gulp.dest('../wp-content/themes/spc-theme/vids'));
});

/* move php across */

gulp.task('movePHP', function() {
    return gulp.src(['src/**/*.php','src/**/*.jpg'])
    .pipe(gulp.dest('../wp-content/themes/spc-theme/'));
});

/* mamp startup for wordpress & broswersync functionality */

var options = {};

gulp.task('start', function(cb){
    mamp(options, 'start', cb);
});
 
gulp.task('stop', function(cb){
    mamp(options, 'stop', cb);
});
 
gulp.task('mamp', ['start']);

// browsersync for wp 

gulp.task('browsersync-wp', ['mamp'], function() {
    //watch files
    var files = [
        '../wp-content/themes/spc-theme/**/*.*'
    ];
 
    //initialize browsersync
    browsersync.init(files, {
    //browsersync with a php server
    proxy: 'localhost:8888'
    });

    gulp.watch("src/scss/*.scss", ['addPrefix']);
    gulp.watch('src/js/**/*.js', ['minifyScripts']);
    gulp.watch('src/*.php', ['movePHP']);
    gulp.watch(["../wp-content/themes/spc-theme/**/*.*"]).on('change', browsersync.reload);

    // gulp.watch(files).on('change', browsersync.reload);

});


/* setting up a clean */

gulp.task('clean', function(){
    del(['../wp-content/themes/spc-theme'], {force: true});
});

/* gulp commands */

// gulp.task('serve-wp',['browsersync-wp']);

gulp.task("wordpress", ["minifyScripts", 'addPrefix','moveImgs', 'moveCss' ,'moveFonts', 'movePHP', 'moveVids']);

/* gulp default */

gulp.task("default", ["clean", "wordpress", "browsersync-wp"]);



