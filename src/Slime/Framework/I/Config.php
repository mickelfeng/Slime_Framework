<?php
namespace Slime\Framework;

interface I_Config
{
    public function get($key, $default = null);

    public function set($key, $value);
}