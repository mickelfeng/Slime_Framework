<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\Cache as I_Cache;

class Cache_File implements I_Cache
{
    private $dir;
    private $file;

    private $data;

    public function __construct(array $config)
    {
        if (!isset($config['file']) || !isset($config['file'])) {
            throw new InvalidArgumentException('config must has dir&&file fields');
        }
        $this->dir = $config['dir'];
        $this->file = $this->dir . DIRECTORY_SEPARATOR . $config['file'];
        unset($config);
        if (!file_exists($this->dir)) {
            if (!mkdir($this->dir, 0777, true)) {
                throw new RuntimeException(sprintf('cache dir [%s] can not be create', $this->dir));
            }
        }
        if (!is_writable($this->dir)) {
            throw new RuntimeException(sprintf('cache dir [%s] can not be write', $this->dir));
        }
        if (!file_exists($this->file)) {
            $fp = fopen($this->file, 'w');
            if (flock($fp, LOCK_EX || LOCK_NB)) {
                if (!is_writeable($this->file)) {
                    flock($fp, LOCK_NB);
                    throw new RuntimeException(sprintf('file [%s] can not be write', $this->file));
                }
                fwrite($fp, 'return array();');
                flock($fp, LOCK_UN);
            }
        }
    }

    public function get($key, $default = null)
    {
        $data = require $this->file;

        $expire = $data[$key]['expire'];
        if ($expire>0 && $expire>time()) {
            $result = $default;
            $this->delete($key);
        } else {
            $result = isset($data[$key]) ? $data[$key] : $default;
        }
        return $result;
    }

    public function set($key, $value, $expire)
    {
        $expire = $expire <= 0 ? 0 : time()+$expire;
        $fp = fopen($this->file, 'r+');
        if (flock($fp, LOCK_EX)) {
            $data = require $this->file;
            $data[$key] = array('value' => $value, 'expire' => $expire);
            $str = '<?php return ' . var_export($data) . ';';
            fwrite($fp, $str);
        }
    }

    public function getMulti($key, $default = null)
    {
        // TODO: Implement getMulti() method.
    }

    public function setMulti(array $mapKeyValue, $expire)
    {
        // TODO: Implement setMulti() method.
    }

    public function delete($key)
    {
        $fp = fopen($this->file, 'r+');
        if (flock($fp, LOCK_EX)) {
            $data = require $this->file;
            unset($data[$key]);
            $str = '<?php return ' . var_export($data) . ';';
            fwrite($fp, $str);
        }
    }

    public function flush()
    {
        // TODO: Implement flush() method.
    }
}