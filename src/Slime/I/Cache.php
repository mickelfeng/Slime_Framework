<?php
namespace Slime\I;

interface Cache
{
    public function factory(array $config);

    public function get($key);

    public function set($key, $value, $expire);

    public function getMulti($key);

    public function setMulti(array $mapKeyValue, $expire);

    public function delete($key);

    public function flush();
}