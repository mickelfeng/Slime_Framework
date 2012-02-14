<?php
namespace SF\Example;

class Test
{
    public static function main(\SF\System\Framework\Route $route)
    {
        \SF\System\Config::load('blog.main');
        $route->pathSegment(1);
    }
}
