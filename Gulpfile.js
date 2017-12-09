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
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('main.css'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(livereload());
});

gulp.task('scripts', () => {
    return gulp.src('./js/*.js')
        .pipe(plumber(plumberErrorHandler))
        .pipe(concat('main.js'))
        .pipe(babel({presets: ['env']}))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js'))
        .pipe(livereload());
});

gulp.task('html', () => {
    return gulp.src('./*.html')
        .pipe(livereload());
});

gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('./css/*.scss', ['styles']);
    gulp.watch('./js/*.js', ['scripts']);
    gulp.watch('./*.html', ['html']);
});

gulp.task('default', ['html', 'styles', 'scripts','watch']);
