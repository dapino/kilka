'use strict'

let gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    babel = require('gulp-babel'),
    uglify = require('gulp-uglify'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload'),
    plumberErrorHandler = { errorHandler: notify.onError({
            title: 'Error',
            message: '<%= error.message %>'
        })};



gulp.task('images', () => {
    return gulp.src('./src/images/*.{jpg,png,svg}')
        .pipe(gulp.dest('./assets/images'))
});

gulp.task('styles', () => {
    return gulp.src('./src/css/*.{css,scss}')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('main.css'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(livereload());
});

gulp.task('scripts', () => {
    return gulp.src('./src/js/*.js')
        .pipe(plumber(plumberErrorHandler))
        .pipe(concat('main.js'))
        .pipe(babel({presets: ['env']}))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js'))
        .pipe(livereload());
});

gulp.task('html', () => {
    return gulp.src('./*.{html, php}')
        .pipe(livereload());
});

gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('./src/css/*.scss', ['styles']);
    gulp.watch('./src/css/modules/*.scss', ['styles']);
    gulp.watch('./src/js/*.js', ['scripts']);
    gulp.watch('./*.{html, php}', ['html']);
});

gulp.task('wp', function() {
    return gulp.src('./assets/**/**.**')
        .pipe(gulp.dest('./kilka-wp-theme/assets'))
});


gulp.task('default', ['html', 'images', 'styles', 'scripts','watch']);
