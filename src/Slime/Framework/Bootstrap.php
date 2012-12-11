<?php
namespace Slime\Framework;

class Bootstrap
{
    CONST EVENT_PRE_SYS = 'pre_system';
    CONST EVENT_PRE_APP = 'pre_app';
    CONST EVENT_POST_APP = 'post_app';
    CONST EVENT_POST_SYS = 'post_system';

    public function __construct(I_APP $app)
    {
        CTX::$app = $app;
        CTX::$event = new Event();
        CTX::$config = new Config();
        CTX::$profiler = new Profiler();
    }

    public function run()
    {
        CTX::$event->callback(self::EVENT_PRE_SYS);
        substr(php_sapi_name(), 0, 3) == 'cgi' ? $this->runHTTP(): $this->runCLI();
        CTX::$event->callback(self::EVENT_POST_SYS);
    }

    private function runCLI()
    {
    }

    private function runHTTP()
    {
        CTX::$httpRequest = Http\Request::createFromCurrentHttpRequest();
        CTX::$httpResponse = new Http\Response();
        CTX::$route = Route::FactoryFromHttpRequest(CTX::$app, CTX::$httpRequest);

        CTX::$event->callback(self::EVENT_PRE_APP);
        CTX::$route->render();
        CTX::$event->callback(self::EVENT_POST_APP);
    }
}
