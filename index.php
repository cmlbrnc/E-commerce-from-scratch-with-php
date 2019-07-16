<?php
/// this  includes all files  automaticly
spl_autoload_register(function($className) {
   

    $dir = __DIR__.'/libs/';
    $filepath=$dir.$className.'.php';

    include($filepath);

 
});

require 'config/general.php';
require 'config/database.php';


$boots = new boots();




?>