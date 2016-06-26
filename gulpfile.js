'use strict';

var gulp = require('gulp');

var gulpif = require('gulp-if');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var autoprefixer = require('gulp-autoprefixer');
var sasslint = require('gulp-sass-lint');
var rename = require('gulp-rename');
var imagemin = require('gulp-imagemin');
var newer = require('gulp-newer');

var themeName = 'craigs-magic';
var themeDir = 'wp-content/themes/' + themeName;

/**
 * Styles task.
 *
 * 1. Using all .scss files in src directory.
 * 2. Lint using the defined config.
 * 3. Auto-prefix CSS rules (e.g. transform => -webkit-transform)
 * 4. Output unminified version.
 * 5. Minify using cssnano.
 * 6. Rename the minified version to avoid overwriting.
 * 7. Output minified version.
 */
gulp.task('styles', function() {

	var outputDirectory = themeDir + '/css';

	return gulp.src('theme-src/styles/*.scss')			// [1]
		.pipe(sasslint({'config': '.sass-lint.yml'}))	// [2]
		.pipe(sasslint.format())
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer('last 2 versions'))			// [3]
		.pipe(gulp.dest(outputDirectory))				// [4]
		.pipe(cssnano())								// [5]
		.pipe(rename({ suffix : '.min' }))				// [6]
		.pipe(gulp.dest(outputDirectory));				// [7]
});

/**
 * Image optimsation task.
 *
 * 1. Use files defined in files.images config.
 * 2. Filter to only images that are newer than in the destination.
 * 3. Output optimised images.
 */
gulp.task('images', function() {

	var outputDirectory = themeDir + '/images';

	var minifyImages = true;

	return gulp.src('theme-src/images/*') /* [1] */
		.pipe(newer(outputDirectory)) /* [2] */
		.pipe(gulpif(minifyImages, imagemin({
			optimizationLevel : 3,
			progressive : true,
			interlaced : true
		})))
		.pipe(gulp.dest(outputDirectory)); /* [3] */

});

/**
 * Copy task. Copies over any files that are not part of other tasks
 * (e.g. HTML pages, JS libraries) to theme.
 *
 * 1. Change the base path to avoid copying top-level directories.
 */
gulp.task('copy', function() {
	return gulp.src('theme-src/copy/**/*', { base : 'theme-src/copy' }) // [1]
		.pipe(gulp.dest(themeDir));
});

gulp.task('watch', function() {
	gulp.watch('theme-src/styles/*.scss', ['styles']);
	gulp.watch('theme-src/images/*', ['images']);
	gulp.watch('theme-src/copy/**/*', ['copy']);
});

gulp.task('develop', ['copy', 'images', 'styles', 'watch']);