const gulp = require('gulp'),
	gcmq = require('gulp-group-css-media-queries'),
	sass = require('gulp-sass'),
	pug = require('gulp-pug'),
	autoprefixer = require('gulp-autoprefixer'),
	cssnano = require('gulp-cssnano'),
	imagemin = require('gulp-imagemin'),
	browserSync = require('browser-sync').create(),
	fs = require("fs"),
	replace = require('gulp-replace'),
	environments = require('gulp-environments'),
	argv = require('yargs').argv,
	gulpif = require('gulp-if'),
	path = require('path'),
	reload = browserSync.reload,
	plumber = require('gulp-plumber'),
	runSequence = require('run-sequence'),
	rename = require('gulp-rename');

//.pipe(gulpif(argv.production, replace('/images/', imagePath)))

gulp.task('default', function(callback){
	runSequence('compile', 'server', 'watch', callback)
});

gulp.task('compile', ['styles', 'scripts', 'images']);      

gulp.task('templates', function(){
	gulp.src('_sources/templates/*.html')
		.pipe(plumber())
		.pipe(gulp.dest("/"));
});

gulp.task('styles', function(){
		gulp.src('_sources/sass/styles.scss')
			.pipe(plumber())
			.pipe(sass())
			.pipe(autoprefixer({
		            browsers: ['last 2 versions'],
		            cascade: false
		        }))
			.pipe(gcmq())
			.pipe(cssnano())
			.pipe(rename("style.css"))
		.pipe(gulp.dest('./'));
});

gulp.task('scripts', function(){
		gulp.src("_sources/js/*")
		.pipe(plumber())
		.pipe(gulp.dest("./js"));
})

gulp.task('images', function(){
		gulp.src("_sources/img/**/*")
		.pipe(plumber())
		.pipe(imagemin())
		.pipe(gulp.dest("images"));
})

gulp.task('watch', function(){
	gulp.watch('./_sources/sass/**/*.scss', ["styles"]);
	gulp.watch('./_sources/js/**/*.js', ["scripts"]);
	//gulp.watch('./sources/templates/*.html', ["templates"]);
	gulp.watch('./_sources/img/**/*', ["images"]);
})

gulp.task('server', function () {
  return browserSync.init(["./*"], {
  	proxy: "localhost:8888/kensongas-co-uk"
  });
});