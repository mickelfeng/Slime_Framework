<?php
namespace Slime\Framework\Impl;

class App implements \Slime\Framework\Intf\App
{
    /** @var \Slime\Framework\Intf\CallBack */
    protected $callback;

    /** @var \Slime\Framework\Intf\Config */
    protected $config;

    /** @var \Slime\Framework\Intf\Debugger */
    protected $debugger;

    /** @var \Slime\Framework\Intf\Event */
    protected $event;

    /** @var \Slime\Framework\Intf\I18n */
    protected $i18n;

    /** @var \Slime\Framework\Intf\Log */
    protected $log;

    /** @var \Slime\Framework\Intf\Profile */
    protected $profiler;

    /** @var \Slime\Framework\Intf\Route */
    protected $route;

    /**
     * @return \Slime\Framework\Intf\CallBack
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @return \Slime\Framework\Intf\Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return \Slime\Framework\Intf\Debugger
     */
    public function getDebugger()
    {
        return $this->debugger;
    }

    /**
     * @return \Slime\Framework\Intf\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @return \Slime\Framework\Intf\I18n
     */
    public function getI18n()
    {
        return $this->i18n;
    }

    /**
     * @return \Slime\Framework\Intf\Log
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @return \Slime\Framework\Intf\Route
     */
    public function getRoute()
    {
        return $this->route;
    }

    public function __construct(
        \Slime\Framework\Intf\CallBack $callback,
        \Slime\Framework\Intf\Config $config,
        \Slime\Framework\Intf\Debugger $debugger,
        \Slime\Framework\Intf\Event $event,
        \Slime\Framework\Intf\I18n $i18n,
        \Slime\Framework\Intf\Log $log,
        \Slime\Framework\Intf\Route $route
    )
    {
        $this->callback = $callback;
        $this->config = $config;
        $this->debugger = $debugger;
        $this->event = $event;
        $this->i18n = $i18n;
        $this->log = $log;
        $this->route = $route;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->event->occur(\Slime\Framework\Intf\Event::PRE_APP);

        $this->route->generate($this->config->get('route'), $this->callback);

        $this->event->occur(\Slime\Framework\Intf\Event::PRE_BLL);

        if ($this->callback->isValidate()) {
            $args = $this->callback->getArgs();
            array_unshift($args, $this);
            $this->callback->setArgs($args);
            $this->callback->call(true);
        }

        $this->event->occur(\Slime\Framework\Intf\Event::POST_APP);
    }
}