<?php
namespace Slime\Framework\Intf;

interface Log extends _Void
{
    const LEVEL_DEBUG = 0;
    const LEVEL_NOTICE = 1;
    const LEVEL_WARN = 2;
    const LEVEL_ERROR = 3;

    /**
     * @return bool
     */
    public function isDisabled();

    /**
     * @param int $minLevel
     * @return void
     */
    public function setMinLevel($minLevel);

    /**
     * @param int $logLevel
     * @param string $logDetail
     * @return void
     */
    public function add($logLevel, $logDetail);

    /**
     * @param $file
     * @param mixed $format
     * @return mixed
     */
    public function flush($file, $format = null);
}