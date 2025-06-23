<?php

spl_autoload_register(function ($class_name) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';

    
    $base_dir = dirname(__DIR__) . DIRECTORY_SEPARATOR; 

    
    $full_path = $base_dir . $file;

   
    if (file_exists($full_path)) {
        require_once $full_path;
    }
});




