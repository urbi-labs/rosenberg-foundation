/*

Run these commands

## if the project is already set up and running:
npm install

## if you check package.json and there aren't dependencies listed ( there should be no reason to do this )
npm install gulp
npm install bower --save-dev
npm install gulp-imagemin --save-dev
npm install gulp-concat --save-dev
npm install gulp-plumber --save-dev
npm install gulp-autoprefixer --save-dev
npm install gulp-minify-css --save-dev
npm install gulp-uglify --save-dev
npm install gulp-rename --save-dev
npm install gulp-notify --save-dev
npm install gulp-include --save-dev
npm install gulp-ruby-sass --save-dev
npm install gulp-watch --save-dev
npm install gulp-sourcemaps --save-dev
npm install gulp-newer --save-dev

## always ( to compile/watch/etc )
bower
gulp

*/


// Config for theme
let settings    = require('./package.json'),
    themePath   = './';

// Gulp Nodes
let gulp = require( 'gulp' );
let plumber = require( 'gulp-plumber' );
let watch = require( 'gulp-watch' );
let minifyCSS = require('gulp-minify-css');
let uglify = require( 'gulp-uglify' );
let rename = require( 'gulp-rename' );
let notify = require( 'gulp-notify' );
let include = require( 'gulp-include' );
let sass = require( 'gulp-sass' );
let autoprefixer = require('gulp-autoprefixer');
let concat = require('gulp-concat');
let imagemin = require('gulp-imagemin');
let sourcemaps = require('gulp-sourcemaps');
let newer = require('gulp-newer');
let livereload = require('gulp-livereload');

sass.compiler = require('node-sass');

// Error Handling
let onError = function( err ) {
	console.log( 'An error occurred:', err.message );
	this.emit( 'end' );
};

gulp.task('scss', () => {
	return gulp.src(themePath + 'style.scss')
	    .pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer('last 4 version'))
		.pipe(minifyCSS({keepBreaks:false}))
	  	.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest(themePath))
		.pipe(livereload())
		.pipe(notify({ message: 'Scss task complete' }));
});


gulp.task('scripts', ()  =>{
	return gulp.src( [themePath + 'js/libs/**/*.js', themePath + 'js/development/**/*.js'] )
		.pipe(concat('js/scripts.js'))
		.pipe(gulp.dest(themePath))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.pipe(gulp.dest(themePath))
		.pipe(livereload())
		.pipe(notify({ message: 'Scripts task complete' }));
});

// Watch task -- this runs on every save.
gulp.task( 'watch', ()  =>{

	// Live reload watch
	livereload.listen(35729);

	gulp.watch(themePath + '**/*.php').on('change', function(file) {
		livereload.changed(file);
	});
	// Watch all .scss files
	gulp.watch( themePath + 'css/**/**/*.*css', gulp.series('scss') );
	// Watch main style.scss file for new inclusions
	gulp.watch( themePath + 'style.scss', gulp.series('scss') );

	// Watch js files
	gulp.watch( themePath + 'js/development/**/*.js', gulp.series('scripts') );

});


// Default task -- runs scss and watch functions
gulp.task( 'default', gulp.parallel('scripts', 'scss', 'watch'));