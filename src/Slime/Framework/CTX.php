<?php
namespace Slime\Framework;

class CTX
{
    /** @var Event */
    public static $event;

    /** @var I_App */
    public static $app;

    /** @var Config */
    public static $config;

    /** @var Http\Request */
    public static $httpRequest;

    /** @var Http\Response */
    public static $httpResponse;

    /** @var Route */
    public static $route;

    /** @var Profiler */
    public static $profiler;
}