<?php
namespace Slime\Framework;

class M_App implements I_App
{
    private $appDir;
    private $bllDir;
    private $configDir;
    private $dalDir;
    private $i18nDir;
    private $libraryDir;
    private $viewDir;

    private $eventConfigName;
    private $routeConfigName;
    private $constantConfigName;
    private $cacheConfigName;

    public function getAppDir()
    {
        return $this->appDir;
    }

    public function getBllDir()
    {
        return $this->bllDir;
    }

    public function getConfigDir()
    {
        return $this->configDir;
    }

    public function getDalDir()
    {
        return $this->dalDir;
    }

    public function getI18nDir()
    {
        return $this->i18nDir;
    }

    public function getLibraryDir()
    {
        return $this->libraryDir;
    }

    public function getViewDir()
    {
        return $this->viewDir;
    }

    public function getCacheConfigName()
    {
        return $this->cacheConfigName;
    }

    public function getConstantConfigName()
    {
        return $this->constantConfigName;
    }

    public function getEventConfigName()
    {
        return $this->eventConfigName;
    }

    public function getRouteConfigName()
    {
        return $this->routeConfigName;
    }

    public function __construct($appDir,
        $cacheConfigName = 'cache',
        $constantConfigName = 'constant',
        $eventConfigName = 'event',
        $routeConfigName = 'route'
    )
    {
        $this->appDir = $appDir;
        $this->bllDir = $appDir . DIRECTORY_SEPARATOR . 'BLL';
        $this->configDir = $appDir . DIRECTORY_SEPARATOR . 'Config';
        $this->dalDir = $appDir . DIRECTORY_SEPARATOR . 'DAL';
        $this->i18nDir = $appDir . DIRECTORY_SEPARATOR . 'I18n';
        $this->libraryDir = $appDir . DIRECTORY_SEPARATOR . 'Library';
        $this->viewDir = $appDir . DIRECTORY_SEPARATOR . 'View';

        $this->cacheConfigName = $cacheConfigName;
        $this->constantConfigName = $constantConfigName;
        $this->eventConfigName = $eventConfigName;
        $this->routeConfigName = $routeConfigName;
    }
}