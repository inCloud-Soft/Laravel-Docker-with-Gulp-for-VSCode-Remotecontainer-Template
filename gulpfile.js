const gulp = require('gulp');
const merge = require('merge-stream');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const watch = require('gulp-watch');
const minifyCSS = require('gulp-minify-css');
const concat = require('gulp-concat');
const env = require('gulp-env');
const shell = require('gulp-shell');
const util = require('util');
const mysql = require('mysql');


gulp.task('copySrc', function() {
	var pipes = [];
	pipes.push(gulp.src('site/src/generators/**/*')
		  .pipe(gulp.dest('site/dist/laravel/')));
	
	pipes.push(gulp.src('site/src/shared/laravel/**/*')
		  .pipe(gulp.dest('site/dist/laravel/')));
		
	return merge(pipes);
});

gulp.task('sassCompile', function () {
    return gulp.src('site/src/shared/scss/main_entry.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./'))
        .pipe(concat('main.css'))
        .pipe(minifyCSS({keepBreaks: true}))
        .pipe(gulp.dest('site/dist/laravel/public/css'))

})

gulp.task('watch', function() {
	gulp.watch('site/src/**/*', { ignoreInitial: false }, gulp.parallel('copySrc', 'sassCompile'));
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
    con.query(`CREATE DATABASE IF NOT EXISTS laravel CHARACTER SET utf32 COLLATE utf32_general_ci;`, function (err, result) {
      if (err) throw err;
      console.log("Database created");
      con.end();
      done();
    });
  });
});
