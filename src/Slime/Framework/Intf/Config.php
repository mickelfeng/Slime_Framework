<?php
namespace Slime\Framework\Intf;

interface Config
{
    public function get($key, $default = null);

    public function set($key, $value);
}