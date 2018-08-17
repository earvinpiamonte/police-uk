var gulp         = require('gulp');
var uglify       = require('gulp-uglify');
var notify       = require('gulp-notify');
var rename       = require('gulp-rename');
var concat       = require('gulp-concat');
var sass         = require('gulp-sass');
var imagemin     = require('gulp-imagemin');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps   = require('gulp-sourcemaps');
var runSequence  = require('run-sequence');
var browserSync  = require('browser-sync').create();
var reload       = browserSync.reload;

// Browser sync
gulp.task('serve', function () {

    // Serve files from the root of this project
    browserSync.init({
        proxy: 'localhost/police-uk/'
    });

	gulp.start('watch');

	gulp.watch("../dist/images/*").on("change", reload);
	gulp.watch("../../application/**/*.php").on("change", reload);

});

// Optimize images
gulp.task('optimize_images', function () {
    gulp.src('images/*')
    .pipe(imagemin(
        [
            imagemin.jpegtran(),
            imagemin.optipng(),
            imagemin.svgo()
        ],
        {
            verbose: true
        }
    ))
    .pipe(gulp.dest('../dist/images'))
    .pipe(notify({ message: 'optimize_images task complete.' }))
    ;
});


// Gulp task to minify CSS files
gulp.task('minify_styles', function(){
	return gulp.src('styles/*.scss')
   		// .pipe(sourcemaps.init())
   		.pipe(sass({outputStyle: 'compressed'})
   		.on('error', sass.logError))
   		// .pipe(sourcemaps.write())
   		.pipe(autoprefixer({
            browsers: ['last 2 versions']
        }))
   		.pipe(concat('styles.min.css'))
		.pipe(gulp.dest('../dist/styles/'))
		.pipe(browserSync.stream())
		.pipe(notify({ message: 'minify_styles task complete.' }))
	;
});

// Gulp task to minify libraries
gulp.task('minify_libraries', function() {
	return gulp.src(
			[
				'node_modules/jquery/dist/jquery.min.js',
				'node_modules/popper.js/dist/umd/popper.min.js',
				'node_modules/bootstrap/dist/js/bootstrap.min.js',
				'node_modules/fg-loadcss/dist/cssrelpreload.min.js'
			]
		)
		.pipe(concat('libraries.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('../dist/libraries/'))
		.pipe(browserSync.stream())
		.pipe(notify({ message: 'minify_libraries task complete.' }))
	;
});

// Gulp task to minify JavaScript files
gulp.task('minify_scripts', function() {
  return gulp.src(
	      [
	        'scripts/*.js'
	      ]
	    )
	    .pipe(concat('scripts.min.js'))
	    .pipe(uglify())
	    .pipe(gulp.dest('../dist/scripts/'))
	    .pipe(browserSync.stream())
	    .pipe(notify({ message: 'minify_scripts task complete.' }))
    ;
});

// Gulp task to minify JavaScript files
gulp.task('minify_external_scripts', function() {
  return gulp.src(
	      [
	        'external/*.js'
	      ]
	    )
	    .pipe(concat('external.min.js'))
	    .pipe(uglify())
	    .pipe(gulp.dest('../dist/external/'))
	    .pipe(browserSync.stream())
	    .pipe(notify({ message: 'minify_external_scripts task complete.' }))
    ;
});

// Gulp default task
gulp.task('default', function () {
	runSequence(
		'minify_styles',
		'minify_libraries',
		'minify_scripts',
		'minify_external_scripts',
		'optimize_images'
	);
});

// Watch
gulp.task('watch', function(){
	gulp.watch('styles/*.scss' , ['minify_styles']);
	gulp.watch('node_modules/*', ['minify_libraries']);
	gulp.watch('scripts/*.js'  , ['minify_scripts']);
	gulp.watch('external/*.js' , ['minify_external_scripts']);
	gulp.watch('images/*'      , ['optimize_images']);
});
