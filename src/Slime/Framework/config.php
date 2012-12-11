<?php
namespace Slime\Framework;

class Config
{
    /** @var I_APP */
    protected $dir;

    protected $configs = array();

    public function __construct($configDir)
    {
        $this->dir = $configDir;
    }

    /**
     * @static
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        if (!isset($this->configs[$key])) {
            $file = $this->dir . DIRECTORY_SEPARATOR . $key . '.php';
            $this->configs[$key] = require $this->dir . DIRECTORY_SEPARATOR . $key . '.php';
        }
        return $this->configs[$key];
    }

    public function set($key, $value)
    {
        $this->configs[$key] = $value;
    }

    public function getRec($key, $default = null)
    {
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

    public function setRec($key, $value)
    {
        $arr = explode('.', $key);
        $v = &$this->configs;
        if (!isset($arr[0])) {
            $this->configs[$key] = require $this->dir . DIRECTORY_SEPARATOR . $key . '.php';
        }
        $len = count($arr);
        foreach ($arr as $k) {
            if (!isset($v[$k])) {
                $v[$k] = array();
            }
            $v = &$v[$k];
        }
        $v = $value;
    }
}
