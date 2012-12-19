<?php
namespace Slime\Framework;

class Bootstrap
{
    private $app;

    public function __construct(I_App $app)
    {
        $this->app = $app;
        $this->app->getEvent()->addMulti($app->getConfig()->get($app->getConfigNameEvent()));
        $this->app->getEvent()->occur(I_Event::PRE_SYS);
    }

    public function run()
    {
        substr(php_sapi_name(), 0, 3) == 'cgi' ?
            $this->runHttp():
            $this->runCli();
    }

    private function runCli()
    {
        $callback = $this->app->getRoute()->makeFromCliInput();
        $this->app->getEvent()->occur(I_Event::PRE_APP);
        $callback->call();
        $this->app->getEvent()->occur(I_Event::POST_APP);
    }

    private function runHttp()
    {
        $callback = $this->app->getRoute()->makeFromHttpRequest();
        $this->app->getEvent()->occur(I_Event::PRE_APP);
        $callback->call();
        $this->app->getEvent()->occur(I_Event::POST_APP);
    }

    public function __destruct()
    {
        CTX::$event->callback(Event::POST_SYS);
    }
}
