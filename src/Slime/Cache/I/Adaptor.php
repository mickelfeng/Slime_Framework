<?php
namespace Slime\Cache;

interface I_Adaptor
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get($key);

    /**
     * @param string $key
     * @param mixed $value
     * @param int $expire
     * @return bool
     */
    public function set($key, $value, $expire);

    /**
     * @param array $keys
     * @return array
     */
    public function getMulti($keys);

    /**
     * @param array $mapKeyValue
     * @param int $expire
     * @return bool
     */
    public function setMulti(array $mapKeyValue, $expire);

    /**
     * @param string $key
     * @return bool
     */
    public function delete($key);

    /**
     * @return bool
     */
    public function flush();

    /**
     * @return void
     */
    public function enable();

    /**
     * @return void
     */
    public function disable();

    /**
     * @return bool
     */
    public function isDisabled();
}