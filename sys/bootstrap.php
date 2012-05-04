<?php
namespace Sys;

class Bootstrap
{
    public function __construct(\I_APP $app)
    {
    }

    public function run()
    {
        Context::getInstance()->register('config', new Config());

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

    private function cliRun()
    {
        Context::getInstance()->register('input', new Cli\Input());
        //Context::getInstance()->register('output', new Cli\Output());
        Context::getInstance()->register('route', new Route(Context::getInstance()->getInput()));

        Context::getInstance()->getRoute()->toApp();
    }

    private function cgiRun()
    {
        Context::getInstance()->register('request', new Http\Request());
        Context::getInstance()->register('response', new Http\Response());

        Context::getInstance()->register('route', new Route(Context::getInstance()->getRequest()));
        Context::getInstance()->getResponse()->setBody(Context::getInstance()->getRoute()->toApp());

        Context::getInstance()->getResponse()->send();
    }

    public function __destruct()
    {
        $this->end_microtime = microtime(true);
    }
}
