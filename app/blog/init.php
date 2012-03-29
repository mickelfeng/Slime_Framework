<?php
namespace App\Blog;

class Init
{
    public static function main(\Sys\Route $route)
    {
        return $route->appExecute();
    }
}