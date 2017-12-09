'use strict'

let gulp = require('gulp'),
    babel = require('gulp-babel'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload'),
    plumberErrorHandler = { errorHandler: notify.onError({
            title: 'Error',
            message: '<%= error.message %>'
        })};




gulp.task('styles', () => {
    return gulp.src('./css/*.scss')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('main.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./assets/css'))
        .pipe(livereload());
});

gulp.task('libjs', () => {
    return gulp.src('./js/*.js')
        .pipe(sourcemaps.init())
        .pipe(plumber(plumberErrorHandler))
        .pipe(concat('main.js'))
        .pipe(sourcemaps.write())
        .pipe(babel({presets: ['env']}))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js'))
        .pipe(livereload());
});

gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('./css/*.scss', ['styles']);
    gulp.watch('./js/*.js', ['scripts']);
});

gulp.task('default', ['styles', 'scripts','watch']);
