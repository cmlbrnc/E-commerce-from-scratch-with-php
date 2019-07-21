/* const gulp =require('gulp'),
browserSync=require('browser-sync').create();

gulp.task('watch',function () { 
            
             
    browserSync.init({
        proxy:"http://localhost/PHP-MVC-Ecommerce-from-scratch/app",
        baseDir: "./",
        open:true,
        notify:false

    });

    gulp.watch('./app/*.php',() => {
        console.log("file save");
        browserSync.reload(); });
         
});


const gulp = require('gulp');





function watch(cb) {

  cb();
}

exports.watch = watch;
 */

/* const { watch } = require('gulp');

exports.build = function() {
  // All events will be watched
  watch('./app/*.php', { events: 'all' }, function(cb) {

    console.log("file save");
    
    cb();
  });
}; */

const { series } = require('gulp');

// The `clean` function is not exported so it can be considered a private task.
// It can still be used within the `series()` composition.
function clean(cb) {
  // body omitted
  
  cb();
}

// The `build` function is exported so it is public and can be run with the `gulp` command.
// It can also be used within the `series()` composition.
function build(cb) {
  // body omitted
  console.log("hello build");
  cb();
}

exports.build = build;


        








