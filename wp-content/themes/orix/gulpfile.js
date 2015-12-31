var gulp = require('gulp')
	, livereload = require('gulp-livereload')
	, connect = require('gulp-connect')
    , watch = require('gulp-watch')
    , sass = require('gulp-sass')
    , compass = require('gulp-compass')
    , notify = require('gulp-notify')
    , concat = require('gulp-concat')
    , stripDebug = require('gulp-strip-debug')
    , uglify = require('gulp-uglify')
    , prefix = require('gulp-autoprefixer');

var templates = "./templates/"
    , srcScripts = "./scripts/"
    , srcSass = "./sass/";

gulp.task('webserver', function() {
  connect.server({
    livereload: true
  });
});
 
gulp.task('templates', function() {
  gulp.src('./templates/*.php')
    .pipe(connect.reload());
});
 
gulp.task('watch', function() {
    gulp.watch('./tememplates/*.php', ['templates']);
    gulp.watch(srcSass+'**.scss', ['sass']);
});

gulp.task('app', function() {
  return gulp.src([
    srcScripts+"*/*.js",
    ])
    .pipe(concat(templates+'js/app.js'))
    .pipe(stripDebug())
    .pipe(uglify())
    .pipe(gulp.dest('./'));
});

gulp.task('sass', function () {
  return gulp.src(srcSass+'*.scss')
    .pipe(gulp.dest("./"))
    .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
});

// JS concat, strip debugging and minify
gulp.task('libs', function() {
  return gulp.src([
      srcScripts+"libs/jquery/*/*.js"
    , srcScripts+"libs/fastclick/*.js"
    , srcScripts+"libs/modernizr/*/*.js"
    ])
    .pipe(concat(templates+'js/libs.min.js'))
    .pipe(stripDebug())
    .pipe(uglify())
    .pipe(gulp.dest('./'));
});
 
gulp.task('default', ['templates',  'watch', 'sass']);
