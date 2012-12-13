<?php
namespace Slime\Cache;

use Slime\I\Cache;
use InvalidArgumentException;
use RuntimeException;

class File implements Cache
{
    private $cacheDir;
    private $file = 'default';

    public function factory(array $config)
    {
        if (!isset($config['cacheDir'])) {
            throw new InvalidArgumentException('config must has cacheDir field');
        }
        $this->cacheDir = $config['cacheDir'];
        if (!file_exists($this->cacheDir)) {
            if (!mkdir($this->cacheDir, 0777, true)) {
                throw new RuntimeException(sprintf('cache dir [%s] can not be create', $config['cacheDir']));
            }
        }
        if (!is_writable($config['cacheDir'])) {
            throw new RuntimeException(sprintf('cache dir [%s] can not be write', $config['cacheDir']));
        }
        if (isset($config['file'])) {
            $this->setFile($config['file']);
        }
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function get($key)
    {
        // TODO: Implement get() method.
    }

    public function set($key, $value, $expire)
    {
        // TODO: Implement set() method.
    }

    public function getMulti($key)
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