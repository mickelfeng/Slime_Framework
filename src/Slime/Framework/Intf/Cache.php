<?php
namespace Slime\Framework\Intf;

interface Cache
{
    public function get($key, $default = null);

    public function set($key, $value, $expire);

    public function getMulti($keys, $default = null);

    public function setMulti(array $mapKeyValue, $expire);

    public function delete($key);

    public function flush();
}