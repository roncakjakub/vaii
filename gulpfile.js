let elixir = require('laravel-elixir');
require('laravel-elixir-livereload');

elixir.config.assetsPath = 'resources/';
elixir.config.publicPath = 'public/';

elixir(function (mix) {
    mix.sass([
        // '../../node_modules/bootstrap/scss/bootstrap.scss',
        '../../node_modules/@fortawesome/fontawesome-free/scss/fontawesome.scss',
        'style.sass',
    ], 'resources/css/from_sass.css')
    // mix.sass(
    //     'style.scss', 'resources/css/from_sass.css')

    mix.combine([
        'node_modules/bootstrap/dist/css/bootstrap.css',
        // 'node_modules/lightbox2/dist/css/lightbox.min.css',
        // 'themes/pavuk/assets/css/flex-gallery.css',
        'resources/css/from_sass.css'
    ], 'public/css/style.css')

    mix.combine([
        'node_modules/jquery/dist/jquery.js',
        // 'themes/pavuk/assets/js/masonry.js',
        'node_modules/bootstrap/dist/js/bootstrap.js',
        // 'themes/pavuk/assets/js/imagesLoaded.js',
        // 'themes/pavuk/assets/js/masonry.js',
        // 'node_modules/lightbox2/dist/js/lightbox.js',
        // 'node_modules/flickity/dist/flickity.pkgd.min.js',
        // 'node_modules/lazyload/lazyload.js',
        'resources/js/app.js',
    ], 'public/js/script.js')
})

// const gulp = require('gulp');
// const concatCss = require('gulp-concat-css');
// const cssNano = require('gulp-cssnano')
// const sass = require('gulp-sass')(require('sass'));
//
// gulp.task('sass', function sassFunc(){
//     return gulp.src('resources/sass/*.sass')
//         .pipe(sass())
//         .pipe(cssNano())
//         // .pipe(concatCss('styles.css'))
//         .pipe(gulp.dest('public/css/'))
// });
//
// // gulp.task('minify', function minifyFunc() {
// //     return gulp.src('./css/styles.css')
// //         .pipe(cssNano())
// //         .pipe(gulp.dest('public/css'));
// // });
//
// gulp.task('combineJS', function minifyFunc() {
//     return gulp.src('resources/js/*.js')
//         // .pipe(concatCss('styles.css'))
//         .pipe(gulp.dest('public/js/'))
// });
//
// gulp.task('watch', function watchFunc() {
//     gulp.watch('resources/sass/*.sass', gulp.series('sass'));
// });
//
// // gulp.task('default', function watchFunc() {
// //     gulp.
// //     gulp.series('sass');
// // });
