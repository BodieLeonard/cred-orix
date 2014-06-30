var gulp = require('gulp')
		, livereload = require('gulp-livereload')
		, connect = require('gulp-connect')
    , watch = require('gulp-watch')
    , sass = require('gulp-sass')
    , compass = require('gulp-compass')
    , notify = require('gulp-notify')
    , minifyHTML = require('gulp-minify-html')
    , concat = require('gulp-concat')
    , stripDebug = require('gulp-strip-debug')
    , uglify = require('gulp-uglify')
    , prefix = require('gulp-autoprefixer');

var www = "./www/"
    , srcScripts = "./scripts/"
    , srcSass = "./sass/";

gulp.task('webserver', function() {
  connect.server({
    livereload: true
  });
});
 
gulp.task('html', function() {
  gulp.src('./*.html')
    .pipe(gulp.dest('./'))
    .pipe(connect.reload());
});
 
gulp.task('watch', function() {
    gulp.watch('./*.html', ['html']);
    gulp.watch(srcSass+'**.scss', ['sass']);
});

gulp.task('app', function() {
  return gulp.src([
    srcScripts+"*/*.js",
    ])
    .pipe(concat(www+'js/app.js'))
    .pipe(stripDebug())
    .pipe(uglify())
    .pipe(gulp.dest('./'));
});

gulp.task('sass', function () {
  return gulp.src(srcSass+'*.scss')
    .pipe(compass({
        config_file: srcSass+'config.rb'
      , sass: 'sass'
    }))
    .pipe(gulp.dest(www+"css"))
    .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
});

// JS concat, strip debugging and minify
gulp.task('libs', function() {
  return gulp.src([
      srcScripts+"libs/jquery/*/*.js"
    , srcScripts+"libs/handlebars/*/*.js"
    , srcScripts+"libs/ember/*/*.js"
    , srcScripts+"libs/fastclick/*.js"
    , srcScripts+"libs/modernizr/*/*.js"
    ])
    .pipe(concat(www+'js/libs.min.js'))
    .pipe(stripDebug())
    .pipe(uglify())
    .pipe(gulp.dest('./'));
});
 
gulp.task('default', ['html', 'webserver', 'watch', 'sass']);
