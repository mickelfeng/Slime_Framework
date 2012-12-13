<?php
namespace Slime\Framework;

use Slime\I\Frame_App;
use Slime\I\Cache;

class CTX
{
    /** @var Event */
    public static $event;

    /** @var Frame_App */
    public static $app;

    /** @var Config */
    public static $config;

    /** @var Route */
    public static $route;

    /** @var Profiler */
    public static $profiler;

    /** @var Cache */
    public static $cache;
}