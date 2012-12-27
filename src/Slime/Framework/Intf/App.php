<?php
namespace Slime\Framework\Intf;

interface App
{
    /**
     * @return void
     */
    public function run();

    /**
     * @return \Slime\Framework\Intf\CallBack
     */
    public function getCallback();

    /**
     * @return \Slime\Framework\Intf\Config
     */
    public function getConfig();

    /**
     * @return \Slime\Framework\Intf\Debugger
     */
    public function getDebugger();

    /**
     * @return \Slime\Framework\Intf\Event
     */
    public function getEvent();

    /**
     * @return \Slime\Framework\Intf\I18n
     */
    public function getI18n();

    /**
     * @return \Slime\Framework\Intf\Log
     */
    public function getLog();

    /**
     * @return \Slime\Framework\Intf\Route
     */
    public function getRoute();
}