<?php
namespace Slime\Framework\Intf;

interface Debugger
{
    /**
     * @param $message
     * @return void
     */
    public function log($message);

    /**
     * @param $message
     * @return void
     */
    public function notice($message);

    /**
     * @param $message
     * @return void
     */
    public function warn($message);

    /**
     * @param $message
     * @return void
     */
    public function error($message);

    /**
     * @param string $label
     * @param string $group
     * @return string
     */
    public function start($label, $group = 'Default');

    /**
     * @param string $tick
     * @throws \InvalidArgumentException
     * @return void
     */
    public function stop($tick);

    /**
     * @param int $format
     * @return mixed
     */
    public function result($format = 0);
}
