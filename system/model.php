<?php
namespace SF\System;

abstract class Model
{
    protected static $_forignKey = null;
    protected static $_beloneTo = null;

    public static function initialize()
    {
        //INIT DB
        //INIT CACHE
    }

    public function __get($str)
    {

    }


    public function persistence()
    {
        ;
    }

    public function delete()
    {
        ;
    }

    public function __toString()
    {
        ;
    }

    public static function getOne($params)
    {
        ;
    }

    public static function getGroup()
    {
        ;
    }
}
