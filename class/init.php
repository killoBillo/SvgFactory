<?php
function _autoloader($class) {
    $DIR = __DIR__;
    $classFile = $DIR . '/' . $class . '.php';

    if(file_exists($classFile))
        include $classFile;
    else {
        print('Class file: "'.$classFile.'" not found!'.PHP_EOL);
        exit();
    }
}
spl_autoload_register('_autoloader');