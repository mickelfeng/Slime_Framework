<?php
namespace Slime\Framework;

class M_Config implements I_Config
{
    protected $dir;

    protected $configs = array();

    public function __construct($configDir)
    {
        $this->dir = $configDir;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if (strpos($key, '.')===false) {
            if (!isset($this->configs[$key])) {
                $file = $this->dir . DIRECTORY_SEPARATOR . $key . '.php';
                $this->configs[$key] = require $this->dir . DIRECTORY_SEPARATOR . $key . '.php';
            }
            return isset($this->configs[$key]) ? $this->configs[$key] : $default;
        } else {
            $arr = explode('.', $key);
            $v = $this->configs;
            if (!isset($arr[0])) {
                $this->configs[$key] = require $this->dir . DIRECTORY_SEPARATOR . $key . '.php';
            }
            foreach ($arr as $k) {
                if (!isset($v[$k])) {
                    return $default;
                }
                $v = $v[$k];
            }
            return $v;
        }
    }

    public function set($key, $value)
    {
        if (strpos($key, '.')===false) {
            $this->configs[$key] = $value;
        } else {
            $arr = explode('.', $key);
            $v = &$this->configs;
            if (!isset($arr[0])) {
                $this->configs[$key] = require $this->dir . DIRECTORY_SEPARATOR . $key . '.php';
            }
            foreach ($arr as $k) {
                if (!isset($v[$k])) {
                    $v[$k] = array();
                }
                $v = &$v[$k];
            }
            $v = $value;
        }
    }
}
