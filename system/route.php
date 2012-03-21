<?php
namespace SF\System;

class Route implements  I_Service
{
    protected $_app;

    protected $_controller;

    protected $_method;

    protected $_params;

    public static function createInstance(array $config)
    {
        return new self($config);
    }

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
        return $this->_app;
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
    public function toApp()
    {
        // load modules
        Service::getConfig()->load(DIR_APP . 'app.conf.php', 'app');
        $map = Service::getConfig()->get('app');
        if (!isset($map[Service::getRequest()->host]))
        {
            throw new \Exception('APP not found!');
        }
        $this->_app = $map[Service::getRequest()->host];
        Service::getConfig()->load(
            DIR_APP . DIRECTORY_SEPARATOR . $this->_app . DIRECTORY_SEPARATOR . 'main.conf.php',
            $this->_app
        );
        $conf = Service::getConfig()->get($this->_app);
        if (!empty($conf['module']))
        {
            foreach ($conf['module'] as $k => $v)
            {
                $name = '\\SF\\' . $v[0];
                unset($v[0]);
                Service::register($k, call_user_func(array($name, 'createInstance'), $v));
            }
        }

        // call app
        $data = call_user_func('\\SF\\' . $this->_app . '\\Init', 'main', $this);
    }

    public function appExecute()
    {
    }
}
