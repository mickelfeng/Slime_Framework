<?php
namespace Slime\Framework;

interface I_App
{
    public function getDirApp();
    public function getDirBLL();
    public function getDirConfig();
    public function getDirI18n();

    public function getConfigNameEvent();
    public function getConfigNameRoute();
    public function getConfigNameCache();

    /** @return I_Config */
    public function getConfig();

    /** @return I_Event */
    public function getEvent();

    /** @return I_I18n */
    public function getI18n();
}