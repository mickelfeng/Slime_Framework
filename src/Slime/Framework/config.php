<?php
namespace Slime\Framework;

class Config
{
    protected $_configs = null;

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
