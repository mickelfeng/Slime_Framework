<?php
namespace Slime\I;

interface Log
{
    const LEVEL_DEBUG = 0;
    const LEVEL_NOTICE = 1;
    const LEVEL_WARN = 2;
    const LEVEL_ERROR = 3;

    public function setFile($file);

    public function add($logLevel, $logDetail);

    public function flush($levelMin, $format = null);
}