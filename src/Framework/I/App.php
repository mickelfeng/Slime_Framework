<?php
namespace Slime\Framework;

interface I_App
{
    /**
     * @return void
     */
    public function run();

    /**
     * @return string
     */
    public function getEnv();

    /**
     * @return I_CallBack
     */
    public function getCallBack();

    /**
     * @return I_Config
     */
    public function getConfig();

    /**
     * @return I_Debugger
     */
    public function getDebugger();

    /**
     * @return I_Event
     */
    public function getEvent();

    /**
     * @return I_I18n
     */
    public function getI18n();

    /**
     * @return I_Route
     */
    public function getRoute();

    /**
     * @return string
     */
    public function getDir();
}