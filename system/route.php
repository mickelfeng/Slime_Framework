<?php
namespace SF\System;

class Route
{
    protected $_app;

    protected $_controller;

    protected $_method;

    protected $_params;

    public function __construct($param)
    {
        if ($param instanceof Http\Request)
        {
            $this->parseRequest();
        }
        elseif ($param instanceof Cli\Input)
        {
            $this->parseInput();
        }
        else
        {
            new \InvalidArgumentException();
        }
    }

    public function parseRequest()
    {
        //app
        //load app config
        //attemp match rules
        //if config.autoroute==true && no match
        //autoroute
    }

    public function parseInput()
    {
    }

    public function getApp()
    {
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getMethod()
    {
        return $this->_method;
    }

    public function getParams()
    {
        return $this->_params;
    }

    /**
     * @return mixed
     */
    public function renderToApp()
    {
        //@todo check app config, register service first
        return call_user_func('\\SF\\' . $this->_app . '\\Init', 'main', $this);
    }

    public function autoRoute()
    {
        ;
    }
}
