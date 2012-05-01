<?php
namespace Sys;

class Bootstrap implements I_Context
{
    public $start_microtime;

    public $end_microtime;

    public static function createInstance(array $config)
    {
        return new self();
    }

    public function __construct()
    {
        $this->start_microtime = microtime(true);

        Context::register('bootstrap', $this);

        Context::register('config', new Config());

        if (substr(php_sapi_name(), 0, 3) == 'cgi')
        {
            define('RUN_MODE','cgi');
            $this->cgiRun();
        }
        else
        {
            define('RUN_MODE','cli');
            $this->cliRun();
        }
    }

    public function cliRun()
    {
        Context::register('input', new Cli\Input());
        //Context::register('output', new Cli\Output());
        Context::register('route', new Route(Context::getInput()));

        Context::getRoute()->toApp();
    }

    public function cgiRun()
    {
        Context::register('request', new Http\Request());
        Context::register('route', new Route(Context::get('request')));
        Context::register('response', new Http\Response());

        Context::getResponse()->setBody(Context::getRoute()->toApp());

        Context::getResponse()->send();
    }

    public function __destruct()
    {
        $this->end_microtime = microtime(true);
    }
}
