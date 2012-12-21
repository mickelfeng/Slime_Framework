<?php
namespace Slime\Framework\Intf;

interface App
{
    public function run();

    /**
     * @return Cache
     */
    public function getCache();

    /**
     * @return CallBack
     */
    public function getCallBack();

    /**
     * @return Config
     */
    public function getConfig();

    /**
     * @return Event
     */
    public function getEvent();

    /**
     * @return I18n
     */
    public function getI18n();

    /**
     * @return Log
     */
    public function getLog();

    /**
     * @return Profile
     */
    public function getProfile();

    /**
     * @return Route
     */
    public function getRoute();}