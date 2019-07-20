const gulp =require('gulp'),
browserSync=require('browser-sync').create();

gulp.task('watch',function () { 
            
             
    browserSync.init({
        proxy:"http://localhost/PHP-MVC-Ecommerce-from-scratch",
        baseDir: "./",
        open:true,
        notify:false

    });

    gulp.watch('./**/*.php',() => {
        browserSync.reload(); });
         
});


        








