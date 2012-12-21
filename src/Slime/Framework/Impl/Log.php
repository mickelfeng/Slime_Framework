<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\Log as I_Log;

use RuntimeException;

class Log implements I_Log
{
    /**
     * @return bool
     */
    public function isDisabled()
    {
        // TODO: Implement isDisabled() method.
    }

    /**
     * @param int $minLevel
     * @return void
     */
    public function setMinLevel($minLevel)
    {
        // TODO: Implement setMinLevel() method.
    }

    /**
     * @param int $logLevel
     * @param string $logDetail
     * @return void
     */
    public function add($logLevel, $logDetail)
    {
        // TODO: Implement add() method.
    }

    /**
     * @param $file
     * @param mixed $format
     * @return mixed
     */
    public function flush($file, $format = null)
    {
        // TODO: Implement flush() method.
    }
}