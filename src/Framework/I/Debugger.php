<?php
namespace Slime\Framework;

interface I_Debugger
{
    const LEVEL_LOG = 1;
    const LEVEL_NOTICE = 2;
    const LEVEL_WARN = 4;
    const LEVEL_ERR = 8;
    const LEVEL_PROFILE = 16;

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
     * @return string
     */
    public function result();
}
