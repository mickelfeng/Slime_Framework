<?php
namespace Sys;

class Config implements I_Service
{
    protected $_configs = null;

    public static function createInstance(array $config)
    {
        return new self();
    }

    public function load($file, $namespace)
    {
        $this->_configs[$namespace] = require $file;
        return true;
    }

    /**
     * @static
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->_configs[$key];
    }

    public function set($key, $value)
    {

    }
}
