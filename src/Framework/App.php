<?php
namespace Slime\Framework;

class App implements I_App
{
    const EVENT_PRE_APP = 'pre_app';
    const EVENT_PRE_CALLBACK = 'pre_callback';
    const EVENT_POST_CALLBACK = 'post_callback';

    /** @var I_CallBack */
    protected $CallBack;

    /** @var I_Config */
    protected $Config;

    /** @var I_Debugger */
    protected $Debugger;

    /** @var I_Event */
    protected $Event;

    /** @var I_I18n */
    protected $I18n;

    /** @var I_Route */
    protected $Route;

    /** @var string */
    protected $dir;

    /** @var string */
    protected $env;

    /**
     * @return I_CallBack
     */
    public function getCallBack()
    {
        return $this->CallBack;
    }

    /**
     * @return I_Config
     */
    public function getConfig()
    {
        return $this->Config;
    }

    /**
     * @return I_Debugger
     */
    public function getDebugger()
    {
        return $this->Debugger;
    }

    /**
     * @return I_Event
     */
    public function getEvent()
    {
        return $this->Event;
    }

    /**
     * @return I_I18n
     */
    public function getI18n()
    {
        return $this->I18n;
    }

    /**
     * @return I_Route
     */
    public function getRoute()
    {
        return $this->Route;
    }

    /**
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param string $dir AppDir
     * @param string $env dev/qa/pre/pub
     * @param I_CallBack $CallBack
     * @param I_Config $Config
     * @param I_Debugger $Debugger
     * @param I_Event $Event
     * @param I_I18n $I18n
     * @param I_Route $Route
     */
    public function __construct(
        $dir,
        $env,
        I_CallBack $CallBack,
        I_Config $Config,
        I_Debugger $Debugger,
        I_Event $Event,
        I_I18n $I18n,
        I_Route $Route
    )
    {
        $this->dir = $dir;
        $this->env = $env;
        $this->CallBack = $CallBack;
        $this->Config = $Config;
        $this->Debugger = $Debugger;
        $this->Event = $Event;
        $this->I18n = $I18n;
        $this->Route = $Route;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->Event->occur(self::EVENT_PRE_APP, array($this));
        $this->Route->generate($this->CallBack);
        $this->Event->occur(self::EVENT_PRE_CALLBACK, array($this));
        $this->CallBack->call();
        $this->Event->occur(self::EVENT_POST_CALLBACK, array($this));
    }

    /**
     * @return string
     */
    public function getEnv()
    {
        return $this->env;
    }
}