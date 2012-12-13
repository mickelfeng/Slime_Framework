<?php
namespace Slime\Cache;

use Slime\I\Cache;
use InvalidArgumentException;
use RuntimeException;

class APC implements Cache
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