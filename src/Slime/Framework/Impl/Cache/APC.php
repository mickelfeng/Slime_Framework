<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\Cache as I_Cache;

class Cache_APC implements I_Cache
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @param int    $expire
     * @return bool
     */
    public function set($key, $value, $expire)
    {
        // TODO: Implement set() method.
    }

    /**
     * @param array $keys
     * @return array
     */
    public function getMulti($keys)
    {
        // TODO: Implement getMulti() method.
    }

    /**
     * @param array $mapKeyValue
     * @param int   $expire
     * @return bool
     */
    public function setMulti(array $mapKeyValue, $expire)
    {
        // TODO: Implement setMulti() method.
    }

    /**
     * @param string $key
     * @return bool
     */
    public function delete($key)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return bool
     */
    public function flush()
    {
        // TODO: Implement flush() method.
    }

    /**
     * @return bool
     */
    public function isDisabled()
    {
        // TODO: Implement isDisabled() method.
    }

    /**
     * @return void
     */
    public function enable()
    {
        // TODO: Implement enable() method.
    }

    /**
     * @return void
     */
    public function disable()
    {
        // TODO: Implement disable() method.
    }
}