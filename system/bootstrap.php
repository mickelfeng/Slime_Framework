<?php
namespace SF\System;

class Bootstrap
{
    public $start_microtime;

    public $end_microtime;

    public function __construct()
    {
        $this->start_microtime = microtime(true);

        Service::register('bootstrap', $this);

        Service::register('config', new Config());
        Service::getConfig()->load('main');

        if (substr(php_sapi_name(), 0, 3) == 'cgi')
        {
            $this->cgiRun();
        }
        else
        {
            $this->cliRun();
        }
    }

    public function cliRun()
    {
        ;
    }

    public function cgiRun()
    {
        Service::register('request', new Http\Request());
        Service::register('route', new Route(Service::get('request')));
        Service::register('response', new Http\Response());

        Service::getResponse()->setBody(Service::getRoute()->renderToApp());

        Service::getResponse()->send();
    }

    public function __destruct()
    {
        $this->end_microtime = microtime(true);
    }
}
