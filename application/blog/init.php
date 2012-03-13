<?php
namespace SF\Blog;

class Init
{
    public static function main(\SF\System\Route $route)
    {
        return $route->autoRoute();
    }
}