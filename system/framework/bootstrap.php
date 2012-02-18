<?php
namespace SF\System\Framework;

class Bootstrap
{
    protected static $_instance;

    public $start_microtime;

    public $end_microtime;

    public $env;

    public $request;

    /**
     * @var Route
     */
    public $route;

    public $response;

    /**
     * @static
     * @return Bootstrap
     */
    public static function instance()
    {
        if (!self::$_instance)
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $this->start_microtime = microtime(true);
        Config::load('main');

        if (substr(php_sapi_name(), 0, 3) == 'cgi')
        {
            $this->cgiRun();
        }
        else
        {
            $this->cliRun();
        }
    }

    private function __clone(){}

    public function cliRun()
    {
        ;
    }

    public function cgiRun()
    {
        $this->request = new \SF\System\Http\Request();
        $this->route   = new \SF\System\Framework\Route($this->request);

        list($class_name, $main_func) = $this->route->mainLogic();

        $response = $class_name::$main_func();

        \SF\System\Http\Response::send($response);
    }

    public function __destruct()
    {
        $this->end_microtime = microtime(true);
    }
}
