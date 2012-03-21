<?php
namespace SF\System;

class Config implements I_Service
{
    protected $_configs = null;

    public static function createInstance(array $config)
    {
        return new self();
    }

    public function load($file, $namespace)
    {
        // $_configs[$file] =
    }

    /**
     * @static
     * @param $key
     * @return mixed
     */
    public function get($key)
    {

    }

    public function set($key, $value)
    {

    }
}
