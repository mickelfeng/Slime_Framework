<?php
use \SF\System\Bootstrap as Bootstrap;

define('ROOT', dirname(dirname(__FILE__)));
spl_autoload_register(
    function($name)
    {
        $file_name = str_replace('\\', DIRECTORY_SEPARATOR, substr($name, 1)) . '.php';
        if (file_exists($file_name))
        {
            require $file_name;
        }
    }
);

new Bootstrap();
