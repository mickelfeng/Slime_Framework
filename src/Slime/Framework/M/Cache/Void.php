<?php
namespace Slime\Framework;

class Void implements I_Cache
{
    public function get($key, $default = null)
    {
        return null;
    }

    public function set($key, $value, $expire)
    {
        return false;
    }

    public function getMulti($keys, $default = null)
    {
        return array();
    }

    public function setMulti(array $mapKeyValue, $expire)
    {
        return array();
    }

    public function delete($key)
    {
        return false;
    }

    public function flush()
    {
        return false;
    }
}