<?php
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

$bootstrap = new \System\Framework\Bootstrap();
if (substr(php_sapi_name(), 0, 3) == 'cgi')
{
    $bootstrap->cgiRun();
}
else
{
    $bootstrap->cliRun();
}