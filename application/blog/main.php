<?php
namespace SF\Blog;

class Main
{
    public static function main()
    {
        \SF\System\Framework\Hook::call('Before_AppRun');

        \SF\System\Framework\Bootstrap::instance()->route->autoRoute();

        \SF\System\Framework\Hook::call('After_AppRun');
    }
}
