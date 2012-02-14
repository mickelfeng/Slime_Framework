<?php
namespace SF\System\Framework;

class Bootstrap
{
    public function __construct()
    {
        ;
    }

    public function cliRun()
    {
        ;
    }

    public function cgiRun()
    {
        $request = new \SF\System\Http\Request();
        $route   = new \SF\System\Framework\Route($request);
        list($class_name, $main_func) = $route->mainLogic();
        $class_name::$main_func($route);
    }
}
