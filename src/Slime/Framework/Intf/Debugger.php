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
     * @param int $level
     * @return mixed
     */
    public function result($level = 0);
}
