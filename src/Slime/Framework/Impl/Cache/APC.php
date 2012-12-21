<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\Cache as I_Cache;

class Cache_APC implements I_Cache
{
    public function get($key, $default = null)
    {
        // TODO: Implement get() method.
    }

    public function set($key, $value, $expire)
    {
        // TODO: Implement set() method.
    }

    public function getMulti($keys, $default = null)
    {
        // TODO: Implement getMulti() method.
    }

    public function setMulti(array $mapKeyValue, $expire)
    {
        // TODO: Implement setMulti() method.
    }

    public function delete($key)
    {
        // TODO: Implement delete() method.
    }

    public function flush()
    {
        // TODO: Implement flush() method.
    }
}