<?php
namespace Sys;

class Context
{
    /**
     * @var Context[]
     */
    private static $instances = array();
    public static $context = 'default';

    private $_services = array();

    public function __construct()
    {
        self::$instances[self::$context] = $this;
    }

    /**
     * @static
     * @return Context
     */
    public static function getInstance()
    {
        return self::$instances[self::$context];
    }

    public function register($service_name, I_Context $service)
    {
        if (isset($this->_services[$service_name]))
        {
            throw new \Exception(sprintf('Service [%s] has been registered!', $service_name));
        }
        $this->_services[$service_name] = $service;
        return true;
    }

    public function unRegister($service_name)
    {
        unset($this->_services[$service_name]);
        return true;
    }

    public function get($service_name)
    {
        if (!isset($this->_services[$service_name]))
        {
            throw new \Exception(sprintf('Service [%s] has not been registered before!', $service_name));
        }
        return $this->_services[$service_name];
    }

    /**
     * @static
     * @return Http\Request
     */
    public function getRequest()
    {
        return $this->_services['request'];
    }

    /**
     * @static
     * @return Http\Response
     */
    public function getResponse()
    {
        return $this->_services['response'];
    }

    /**
     * @static
     * @return Route
     */
    public function getRoute()
    {
        return $this->_services['route'];
    }

    /**
     * @static
     * @return Config
     */
    public function getConfig()
    {
        return $this->_services['config'];
    }

    /**
     * @static
     * @return Cli\Input
     */
    public function getInput()
    {
        return $this->_services['input'];
    }
}