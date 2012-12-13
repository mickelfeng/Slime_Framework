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
    }

    public function run(Cache $cacheInstance)
    {
        CTX::$cache = $cacheInstance;
        CTX::$profiler = new Profiler();
        CTX::$event = new Event();

        CTX::$event->addMulti(CTX::$config->get(CTX::$app->getEventConfigName()));
        CTX::$event->callback(Event::PRE_SYS);

        substr(php_sapi_name(), 0, 3) == 'cgi' ?
            $this->runHttp():
            $this->runCli();
        CTX::$event->callback(Event::POST_SYS);
    }

    private function runCli()
    {
    }

    private function runHttp()
    {
        CTX::$route = Route::FactoryFromHttpRequest(
            CTX::$config->get(CTX::$app->getRouteConfigName()),
            CTX::$app->getBLLDir()
        );
        CTX::$event->callback(Event::PRE_APP);
        CTX::$route->render();
        CTX::$event->callback(Event::POST_APP);
    }
}
