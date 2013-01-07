<?php
namespace Slime\Cache;

class Adaptor_Memcached extends Adaptor implements I_Adaptor
{
    private $configs;

    /** @var \Memcached */
    private $instance;

    public function __construct(array $configs)
    {
        $this->configs = $configs;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->getInstance()->get($key);
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @param int    $expire
     * @return bool
     */
    public function set($key, $value, $expire)
    {
        return $this->getInstance()->set($key, $value, $expire);
    }

    /**
     * @param array $keys
     * @return array
     */
    public function getMulti($keys)
    {
        return $this->getInstance()->getMulti($keys);
    }

    /**
     * @param array $mapKeyValue
     * @param int   $expire
     * @return bool
     */
    public function setMulti(array $mapKeyValue, $expire)
    {
        return $this->getInstance()->setMulti($mapKeyValue, $expire);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function delete($key)
    {
        return $this->getInstance()->delete($key);
    }

    /**
     * @return bool
     */
    public function flush()
    {
        return $this->getInstance()->flush();
    }

    /**
     * @return \Memcached
     */
    private function getInstance()
    {
        if (!$this->instance) {
            $this->instance = new \Memcached();
            $this->instance->addServers($this->configs['servers']);
        }
        return $this->instance;
    }
}