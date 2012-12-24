<?php
namespace Slime\Framework\Intf;

interface Profile extends _Void
{
    /**
     * @param string $label
     * @param string $group
     * @return string
     */
    public function start($label, $group = 'Default');

    /**
     * @param $tick
     * @return void
     */
    public function stop($tick);

    /**
     * @param mixed $type
     * @return mixed
     */
    public function result($type = null);

    /**
     * @return bool
     */
    public function isDisable();
}