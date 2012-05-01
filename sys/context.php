<?php
namespace Sys;

class Context
{
    private static $_services = array();

    public static function register($service_name, I_Service $service)
    {
        if (isset(self::$_services[$service_name]))
        {
            throw new \Exception(sprintf('Service [%s] has been registered!', $service_name));
        }
        self::$_services[$service_name] = $service;
        return true;
    }

    public static function unRegister($service_name)
    {
        unset(self::$_services[$service_name]);
        return true;
    }

    public static function get($service_name)
    {
        if (!isset(self::$_services[$service_name]))
        {
            throw new \Exception(sprintf('Service [%s] has not been registered before!', $service_name));
        }
        return self::$_services[$service_name];
    }

    /**
     * @static
     * @return Http\Request
     */
    public static function getRequest()
    {
        return self::$_services['request'];
    }

    /**
     * @static
     * @return Http\Response
     */
    public static function getResponse()
    {
        return self::$_services['response'];
    }

    /**
     * @static
     * @return Route
     */
    public static function getRoute()
    {
        return self::$_services['route'];
    }

    /**
     * @static
     * @return Config
     */
    public static function getConfig()
    {
        return self::$_services['config'];
    }

    /**
     * @static
     * @return Cli\Input
     */
    public static function getInput()
    {
        return self::$_services['input'];
    }
}