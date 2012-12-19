<?php
namespace Slime\Framework;

class M_App implements I_App
{
    /** @var I_Config */
    private $config;

    /** @var I_Event */
    private $event;

    /** @var I_I18n */
    private $i18n;

    private $dirApp, $dirBll, $dirConfig, $dirI18n;

    private $configNameEvent, $configNameRoute, $configNameCache;

    public function __construct($dirApp,
                                $configNameCache = 'cache',
                                $configNameEvent = 'event',
                                $configNameRoute = 'route'
    )
    {
        $this->appDir = $dirApp;
        $this->bllDir = $dirApp . DIRECTORY_SEPARATOR . 'BLL';
        $this->configDir = $dirApp . DIRECTORY_SEPARATOR . 'Config';
        $this->i18nDir = $dirApp . DIRECTORY_SEPARATOR . 'I18n';

        $this->configNameCache = $configNameCache;
        $this->configNameEvent = $configNameEvent;
        $this->configNameRoute = $configNameRoute;
    }

    /**
     * @return I_Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    public function getConfigNameCache()
    {
        return $this->configNameCache;
    }

    public function getConfigNameEvent()
    {
        return $this->configNameEvent;
    }

    public function getConfigNameRoute()
    {
        return $this->configNameRoute;
    }

    public function getDirApp()
    {
        return $this->dirApp;
    }

    public function getDirBll()
    {
        return $this->dirBll;
    }

    public function getDirConfig()
    {
        return $this->dirConfig;
    }

    public function getDirI18n()
    {
        return $this->dirI18n;
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
}