var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var imagemin = require('gulp-imagemin');
var livereload = require('gulp-livereload');
var fs = require('node-fs');
var fse = require('fs-extra');
var json = require('json-file');
var themeName = json.read('./package.json').get('themeName');
var themeDir = '../' + themeName;

input = {
    'css': 'assets/styles/**/**/*.css',
    'javascript': 'assets/scripts/**/*.js'
},

    output = {
        'css': '.',
        'javascript': '.'
    };


// Compile Our Sass
gulp.task('css', function () {
    return gulp.src(input.css)
        .pipe(autoprefixer({
            browsers: ['> 1%', 'last 2 versions', 'Firefox ESR']
        }))
        .pipe(gulp.dest(output.css))
        .pipe(livereload());

});

// Concatenate & Minify JS
gulp.task('scripts', function () {
    return gulp.src(input.javascript)
        .pipe(concat('scripts.js'))
        .pipe(rename('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(output.javascript))
        .pipe(livereload());
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch(input.javascript, ['scripts']);
    gulp.watch(input.css, ['css']);

    gulp.watch('./**/*.php').on('change', function (file) {
        // reload browser whenever any PHP file changes
        livereload.changed(file);
    });
});

// Default Task
gulp.task('default', ['css', 'scripts', 'watch']);