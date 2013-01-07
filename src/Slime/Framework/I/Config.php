<?php
namespace Slime\Framework;

interface I_Config
{
    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value);
}