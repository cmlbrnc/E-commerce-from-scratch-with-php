//require('./gulp/tasks/watch');



/* const gulp =require('gulp'),
browserSync=require('browser-sync').create();

gulp.task('watch',function () { 
            
             
    

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
  
}; */

const { series,parallel,watch } = require('gulp');
const browserSync=require('browser-sync').create();

function sync(cb) {
    browserSync.init({
        proxy:"http://localhost/PHP-MVC-Ecommerce-from-scratch/app",
        notify:false,
        files: [
            './app/**/*.php',
            './app/*.php',
            './app/**/**/*.php',
            './app/**/**/**/*.php',
            ''
     ],
     port: 8080

    });


   
  cb();
}
function build(cb) {
 
  watch(['./app/*.php', './app/**/*.php','./app/**/**/*.php'], { events: 'all' }, function(cb) {

    console.log("file save");
    browserSync.reload();
    cb();
  });
  cb();
}

exports.default = parallel(sync,build);

