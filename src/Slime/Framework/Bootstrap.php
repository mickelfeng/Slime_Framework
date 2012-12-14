<?php
namespace Slime\Framework;

use Slime\I\Frame_App;
use Slime\I\Cache;

class Bootstrap
{
    public function __construct(Frame_App $app)
    {
        CTX::$app = $app;
        CTX::$config = new Config($app->getConfigDir());
        CTX::$profiler = new Profiler();
        CTX::$event = new Event();

        CTX::$event->addMulti(CTX::$config->get(CTX::$app->getEventConfigName()));
        CTX::$event->callback(Event::PRE_SYS);
    }

    public function run()
    {
        substr(php_sapi_name(), 0, 3) == 'cgi' ?
            $this->runHttp():
            $this->runCli();
    }

    private function runCli()
    {
    }

    private function runHttp()
    {
        CTX::$route = Route::factoryFromHttpRequest(
            CTX::$config->get(CTX::$app->getRouteConfigName()),
            CTX::$app->getBLLDir()
        );
        CTX::$event->callback(Event::PRE_APP);
        CTX::$route->render();
        CTX::$event->callback(Event::POST_APP);
    }

    public function __destruct()
    {
        CTX::$event->callback(Event::POST_SYS);
    }
}
