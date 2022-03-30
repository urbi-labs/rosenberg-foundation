/*

Run these commands

## if the project is already set up and running:
npm install

## if you check package.json and there aren't dependencies listed ( there should be no reason to do this )
npm install gulp
npm install bower --save-dev
npm install gulp-concat --save-dev
npm install gulp-autoprefixer --save-dev
npm install gulp-minify-css --save-dev
npm install gulp-uglify --save-dev
npm install gulp-rename --save-dev
npm install gulp-ruby-sass --save-dev
npm install gulp-sourcemaps --save-dev

## always ( to compile/watch/etc )
bower
gulp

*/


// Config for theme
const themePath   = './';

// Gulp Nodes
const gulp = require( 'gulp' );
const minifyCSS = require('gulp-minify-css');
const uglify = require( 'gulp-uglify' );
const rename = require( 'gulp-rename' );
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');
const livereload = require('gulp-livereload');
const sass = require('gulp-sass')(require('sass'));

// Error Handling
const onError = function( err ) {
	console.log( 'An error occurred:', err.message );
	this.emit( 'end' );
};

gulp.task('scss', () => {
	return gulp.src(themePath + 'style.scss')
		.pipe(sourcemaps.init())
	    .pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer('last 4 version'))
		.pipe(minifyCSS({keepBreaks:false}))
	  	.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest(themePath))
		.pipe(livereload())
});


gulp.task('scripts', ()  =>{
	return gulp.src( [themePath + 'js/libs/**/*.js', themePath + 'js/development/**/*.js'] )
		.pipe(sourcemaps.init())
		.pipe(concat('js/scripts.js'))
		.pipe(gulp.dest(themePath))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest(themePath))
		.pipe(livereload())
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