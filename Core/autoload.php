<?php
spl_autoload_register(function($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path = '/PiePHP/';
    $file = $root . $path . $className . '.php';
    
    if (file_exists($file)) {
        include_once $file;
    } else {
        echo "File not loaded ! ";
    }
});