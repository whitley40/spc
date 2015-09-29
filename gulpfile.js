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
    .pipe(gulp.dest('dev/css'))
    .pipe(rename('style.css'))
    .pipe(gulp.dest('../wp-content/themes/spc-theme'));
});


/* autoprefix the css */

gulp.task('addPrefix', ['compileSass'], function() {
    return gulp.src('dev/css/styles.css')
    .pipe(autoprefixer())
    .pipe(gulp.dest('src/css'))
    .pipe(gulp.dest('dev/css'))
    .pipe(rename('style.css'))
    .pipe(gulp.dest('../wp-content/themes/spc-theme'));
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
        'src/js/**/*.js',
        '!src/js/app.js'])
    .pipe(maps.init())
    .pipe(concat("app.js"))
    .pipe(maps.write('../maps'))
    .pipe(gulp.dest('../wp-content/themes/spc-theme/js'))
    .pipe(gulp.dest('src/js'))
    .pipe(gulp.dest('dev/js'));
});


/* minify javascript once its been through concat */

gulp.task("minifyScripts", ["concatScripts"],  function(){
    return gulp.src("dev/js/app.js")
    .pipe(uglify())
    .pipe(rename('app.js'))
    .pipe(gulp.dest('../wp-content/themes/spc-theme/js'))
    .pipe(gulp.dest('dist/js'));
});

/* move images across */

gulp.task('moveImgs', function() {
    return gulp.src('src/imgs/**')
    .pipe(gulp.dest('../wp-content/themes/spc-theme/imgs'))
    .pipe(gulp.dest('dev/imgs'))
    .pipe(gulp.dest('dist/imgs'));
});

/* move fonts across */

gulp.task('moveFonts', function() {
    return gulp.src('src/fonts/**')
    .pipe(gulp.dest('../wp-content/themes/spc-theme/fonts'))
    .pipe(gulp.dest('dev/fonts'))
    .pipe(gulp.dest('dist/fonts'));
});

/* run browsersync */

gulp.task('browserSync', function() {
    browsersync.init( {
        server: {
            baseDir: "src",
            directory:true
        }
    });

    gulp.watch("src/scss/*.scss", ['addPrefix']);
    gulp.watch('src/js/**/*.js', ['concatScripts']);
    gulp.watch(["src/*.html","src/css/*.css", "src/js/app.js"]).on('change', browsersync.reload);

});


/* setting up a clean */

gulp.task('clean', function(){
    del(['dist', 'dev', '../wp-content/themes/spc-theme' , 'src/js/app.js', 'src/css', 'src/maps']);
})

/* gulp commands */

gulp.task('serve',['browserSync']);

gulp.task("build", ["addPrefix", "concatScripts",'moveImgs','moveFonts'], function() {
    return gulp.src(['src/*.html'])
            .pipe(gulp.dest('dev'));
});

gulp.task("production", ["minifyScripts","minifyCss",'moveImgs','moveFonts'], function() {
    return gulp.src(['src/*.html'])
            .pipe(gulp.dest('dist'));
});

/* adding all to WP theme */

gulp.task("wp", ["minifyScripts","addPrefix",'moveImgs','moveFonts'], function() {
    return gulp.src(['src/*.php'])
            .pipe(gulp.dest('../wp-content/themes/spc-theme'));
});


/* gulp default */

gulp.task("default", ["clean", "build"], function(){
    gulp.start("serve");
});



