<?php
namespace Sys;

class Route implements I_Service
{
    protected $_app;

    protected $_logic;

    protected $_method;

    protected $_params = array();

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
            $this->parseInput($param);
        }
        else
        {
            new \InvalidArgumentException();
        }
        Context::getConfig()->load(DIR_APP . DIRECTORY_SEPARATOR . 'app.conf.php', 'app');
    }

    public function parseRequest()
    {
        if (!isset($map[Context::getRequest()->host]))
        {
            throw new \Exception('APP not found!');
        }
        $this->_app = $map[Context::getRequest()->host];
    }

    public function parseInput()
    {
        $map = Context::getConfig()->get('app');
        $this->_app = Context::getInput()->arg0;
        if (strstr($this->_app, '='))
        {
            list(,$this->_app) = explode('=', $this->_app);
        }
        $map = array_flip($map);
        if (!isset($map[$this->_app]))
        {
            throw new \Exception('APP not found!');
        }

        if (!empty(Context::getInput()->args))
        {
            $i = 0;
            foreach (Context::getInput()->args as $arg)
            {
                if (strstr($arg, '='))
                {
                    list($k, $v) = explode('=', $arg);
                    $k = ltrim($k, '-');
                    $this->_params[$k] = $v;
                }
                else
                {
                    $this->_params[$i++] = $arg;
                }
            }
        }
    }

    public function getApp()
    {
        return $this->_app;
    }

    public function getLogic()
    {
        return $this->_logic;
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
        Context::getConfig()->load(
            DIR_APP . DIRECTORY_SEPARATOR . $this->_app . DIRECTORY_SEPARATOR . 'main.conf.php',
            $this->_app
        );
        $conf = Context::getConfig()->get($this->_app);
        if (!empty($conf['module']))
        {
            foreach ($conf['module'] as $k => $v)
            {
                $name = array_shift($v);
                Context::register($k, call_user_func(array($name, 'createInstance'), $v));
            }
        }

        // call app
        $data = call_user_func(array('\\App\\' . $this->_app . '\\Init', 'main'), $this);

        // if need tpl

        return $data;
    }

    public function appExecute()
    {
        if (isset($this->_logic) && isset($this->_method))
        {

        }
    }

    public function makeOtherRoute($logic = null, $method = null, $params = null)
    {
        $inst = clone $this;
        if ($logic !== null) $inst->_logic = $logic;
        if ($method !== null) $inst->_method = $method;
        if ($params !== null) $inst->_params = $params;
        return $inst;
    }
}
