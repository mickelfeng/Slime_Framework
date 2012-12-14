<?php
namespace Slime\Framework;

interface I_App
{
    public function getAppDir();
    public function getBLLDir();
    public function getConfigDir();
    public function getI18nDir();

    public function getEventConfigName();
    public function getRouteConfigName();
    public function getCacheConfigName();
}