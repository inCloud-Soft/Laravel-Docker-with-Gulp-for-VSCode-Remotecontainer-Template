"use strict";
const gulp = require('gulp');
const merge = require('merge-stream');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
// const watch = require('gulp-watch');
const minifyCSS = require('gulp-minify-css');
const concat = require('gulp-concat');
const env = require('gulp-env');
// const shell = require('gulp-shell');
// const util = require('util');
const mysql = require('mysql');
// const minify = require('gulp-minify');
const browserify = require('gulp-browserify');
// const babel = require("gulp-babel");
// const notify = require("gulp-notify");
// const plumber = require("gulp-plumber");

gulp.task('copySrc', function() {
	var pipes = [];
	pipes.push(gulp.src('site/src/generators/**/*')
		  .pipe(gulp.dest('site/dist/laravel/')));
	
	// pipes.push(gulp.src('site/src/generators_jetstream/**/*')
	// 	  .pipe(gulp.dest('site/dist/laravel/')));
	
	// pipes.push(gulp.src('site/src/generators_orchid/**/*')
	// 	  .pipe(gulp.dest('site/dist/laravel/')));

  // pipes.push(gulp.src('site/src/generators/**/*')
	// 	  .pipe(gulp.dest('site/dist/laravel/')));
	
	// pipes.push(gulp.src('site/src/shared/laravel/**/*')
	// 	  .pipe(gulp.dest('site/dist/laravel/')));

	return merge(pipes);
});

gulp.task('sassCompile', function () {
    return gulp.src('site/src/shared/scss/main_entry.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCSS({keepBreaks: true}))
        .pipe(concat('main.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('site/dist/laravel/public/css'))

})

gulp.task('jsCompile', function () {

    // var errorFree = true;

    // var onError = function(err) {

    //     errorFree = false;

    //     var subtitle = "Error";
    //     var message = error.message;

    //     notify.onError({
    //         title:    "Gulp",
    //         subtitle: subtitle,
    //         message:  message,
    //         sound: false
    //     })(err);

    //     this.emit('end');
    // };
    return gulp.src('site/src/shared/js/main-entry.js')
    //.pipe( plumber({ errorHandler: onError }) )
    //.on('error', )
    //.pipe(babel())
    // .pipe(minify({
    //   ext: {
    //     min: '.min.js'
    //   },
    //   ignoreFiles: ['-min.js']
    // }))
    
    .pipe(browserify({ transform: ['babelify'] }))
    .pipe(concat('main.js'))
    .pipe(gulp.dest('site/dist/laravel/public/js'))
    //.pipe(notify({ title: "Success", message: "Well Done!", sound: "Glass" }));

})

gulp.task('watch', function() {
	gulp.watch('site/src/**/*', { ignoreInitial: false }, gulp.parallel('copySrc', 'sassCompile', "jsCompile"));
});

gulp.task('watch_files', function() {
	gulp.watch('site/src/**/*', { ignoreInitial: false }, gulp.parallel('copySrc'));
});

 
gulp.task('firstDeploy',  function(done) {
  // todo: custom handler for vars with ".", "=" or ":"
  env({
    file: 'site/dist/laravel/.env',
    vars: {
		  DB_DATABASE: 'laravel'
    }
  });
  done();
});

gulp.task('createDb', function(done) {
  
  const con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: ""
  });

  con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");
    con.query(`CREATE DATABASE IF NOT EXISTS laravel_template CHARACTER SET utf32 COLLATE utf32_general_ci;`, function (err, result) {
      if (err) throw err;
      console.log("Database created");
      con.end();
      done();
    });
  });
});
