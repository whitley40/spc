var gulp = require('gulp'),
sass = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer'),
minifycss = require('gulp-minify-css'),
uglify = require('gulp-uglify'),
rename = require('gulp-rename'),
concat = require('gulp-concat'),
maps = require('gulp-sourcemaps'),
browsersync = require('browser-sync').create(),
del = require('del');

/* compiling the sass */

gulp.task('compileSass', function() {
    return gulp.src('src/scss/styles.scss')
    .pipe(maps.init())
    .pipe(sass())
    .pipe(maps.write('../maps'))
    .pipe(gulp.dest('src/css'))
    .pipe(gulp.dest('dev/css'));
});


/* autoprefix the css */

gulp.task('addPrefix', ['compileSass'], function() {
    return gulp.src('dev/css/styles.css')
    .pipe(autoprefixer())
    .pipe(gulp.dest('src/css'))
    .pipe(gulp.dest('dev/css'));
});

/* minify the css */

gulp.task('minifyCss', ['addPrefix'], function(){
    return gulp.src("dev/css/styles.css")
    .pipe(minifycss())
    .pipe(gulp.dest("dist/css")); 
})

/* concat the javascripts */

gulp.task("concatScripts", function(){
    return gulp.src([
        'src/js/**/*.js'])
    .pipe(maps.init())
    .pipe(concat("app.js"))
    .pipe(maps.write('../maps'))
    .pipe(gulp.dest('src/js'))
    .pipe(gulp.dest('dev/js'));
});


/* minify javascript once its been through concat */

gulp.task("minifyScripts", ["concatScripts"],  function(){
    return gulp.src("dev/js/app.js")
    .pipe(uglify())
    .pipe(rename('app.min.js'))
    .pipe(gulp.dest('dist/js'));
});

/* run browsersync */

gulp.task('browserSync', function() {
    browsersync.init( {
        server: {
            baseDir: "src",
            directory:true
        }
    });
});


/* watching files */

gulp.task('watchFiles', function() {
    gulp.watch('src/scss/*.scss', ['addPrefix']);
    gulp.watch('src/js/**/*.js', ['concatScripts']);
});


/* setting up a clean */

gulp.task('clean', function(){
    del(['dist', 'dev', 'src/js/app.js', 'src/css', 'src/maps']);
})

/* gulp commands */

gulp.task('serve',['watchFiles','browserSync']);

gulp.task("build", ["addPrefix", "concatScripts" ], function() {
    return gulp.src(['src/*.html','src/imgs','src/fonts'])
            .pipe(gulp.dest('dev'));
});

gulp.task("production", ["minifyScripts","minifyCss"], function() {
    return gulp.src(['src/*.html','src/imgs','src/fonts'])
            .pipe(gulp.dest('dist'));
});

/* gulp default */

gulp.task("default", ["clean"], function(){
    gulp.start("serve");
});



