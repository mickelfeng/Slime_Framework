<?php
namespace Slime\Framework\Intf;

interface App
{
    /**
     * @return void
     */
    public function run();

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
    public function getRoute();

    /**
     * @return View
     */
    public function getView();
}