<?php
namespace App\Blog;

spl_autoload_register(
    function($name)
    {
        $file_name = DIR_ROOT . str_replace('\\', DIRECTORY_SEPARATOR, substr($name, 1)) . '.php';
        if (file_exists($file_name))
        {
            require $file_name;
        }
    }
);

class BlogApp implements \I_APP
{
    public function getAppDir()
    {
        // TODO: Implement getAppDir() method.
    }

    public function getConfigDir()
    {
        // TODO: Implement getConfigDir() method.
    }

    public function getI18nDir()
    {
        // TODO: Implement getI18nDir() method.
    }

    public function getBusinessLogicDir()
    {
        // TODO: Implement getBusinessLogicDir() method.
    }
}

$boot = new \Sys\Bootstrap(new BlogApp());
$boot->run();
