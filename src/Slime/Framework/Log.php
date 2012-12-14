<?php
namespace Slime\Framework;

use Slime\I\Log as ILog;
use RuntimeException;

class Log implements ILog
{
    public function setFile($file)
    {
        if (!file_exists($file)) {
            if (($pos = strrpos($file, '/'))!==false) {
                $dir = substr($file, 0, $pos);
                if (!mkdir($dir, 0777, true)) {
                    throw new RuntimeException();
                }
            }
        }
    }

    public function add($logLevel, $logDetail)
    {
        // TODO: Implement add() method.
    }

    public function flush($levelMin, $format = null)
    {
        // TODO: Implement flush() method.
    }
}