<?php
namespace SF\Blog;
use \SF\System as Sys;

class Init
{
    public static function main(Sys\Route $route)
    {
        return $route->appExecute();
    }
}