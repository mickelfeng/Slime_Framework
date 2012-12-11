<?php
namespace Slime\Framework;

class App implements I_APP
{
    private $appDir;
    private $bllDir;
    private $configDir;
    private $dalDir;
    private $i18nDir;
    private $libraryDir;
    private $viewDir;

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

    public function __construct($appDir)
    {
        $this->appDir = $appDir;
        $this->bllDir = $appDir . DIRECTORY_SEPARATOR . 'BLL';
        $this->configDir = $appDir . DIRECTORY_SEPARATOR . 'Config';
        $this->dalDir = $appDir . DIRECTORY_SEPARATOR . 'DAL';
        $this->i18nDir = $appDir . DIRECTORY_SEPARATOR . 'I18n';
        $this->libraryDir = $appDir . DIRECTORY_SEPARATOR . 'Library';
        $this->viewDir = $appDir . DIRECTORY_SEPARATOR . 'View';
    }
}