<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\App as I_App;
use Slime\Framework\Intf\Cache as I_Cache;
use Slime\Framework\Intf\CallBack as I_CallBack;
use Slime\Framework\Intf\Config as I_Config;
use Slime\Framework\Intf\Event as I_Event;
use Slime\Framework\Intf\I18n as I_I18n;
use Slime\Framework\Intf\Log as I_Log;
use Slime\Framework\Intf\Profile as I_Profile;
use Slime\Framework\Intf\Route as I_Route;

class App implements I_App
{
    /** @var I_Cache */
    private $cache;

    /** @var I_CallBack */
    private $callBack;

    /** @var I_Config */
    private $config;

    /** @var I_Event */
    private $event;

    /** @var I_I18n */
    private $i18n;

    /** @var I_Log */
    private $log;

    /** @var I_Profile */
    private $profile;

    /** @var I_Route */
    private $route;

    public function __construct(I_Cache $cache, I_CallBack $callback, I_Config $config, I_Event $event, I_I18n $i18n, I_Log $log, I_Profile $profile, I_Route $route)
    {
        $this->cache = $cache;
        $this->callBack = $callback;
        $this->config = $config;
        $this->event = $event;
        $this->i18n = $i18n;
        $this->log = $log;
        $this->profile = $profile;
        $this->route = $route;
    }

    public function run()
    {
        ;
    }

    /**
     * @return I_Cache
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @return I_CallBack
     */
    public function getCallBack()
    {
        return $this->callBack;
    }

    /**
     * @return I_Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return I_Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @return I_I18n
     */
    public function getI18n()
    {
        return $this->i18n;
    }

    /**
     * @return I_Log
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @return I_Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @return I_Route
     */
    public function getRoute()
    {
        return $this->route;
    }
}