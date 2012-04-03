<?php
use Sys\Bootstrap as Bootstrap;

define('DIR_ROOT', dirname(dirname(__FILE__)));
define('DIR_SYS', DIR_ROOT . DIRECTORY_SEPARATOR . 'system');
define('DIR_APP', DIR_ROOT . DIRECTORY_SEPARATOR . 'applacation');

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
