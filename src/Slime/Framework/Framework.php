<?php
namespace Slime\Framework;

final class Framework
{
    private $app;

    public function __construct(I_App $app)
    {
        $this->app = $app;
        $this->app->getEvent()->addMulti($this->app->getConfig()->get($this->app->getConfigNameEvent()));
        $this->app->getEvent()->occur(I_Event::PRE_SYS);
    }

    public function run()
    {
        $isMatched = $this->app->getRoute()->generate(
            $this->app->getConfig()->get($this->app->getConfigNameRoute()),
            $this->app->getRouteCallBack()
        );
        $this->app->getEvent()->occur(I_Event::PRE_APP);
        if ($isMatched) {
            $this->app->getRouteCallBack()->call();
        }
        $this->app->getEvent()->occur(I_Event::POST_APP);
    }

    public function __destruct()
    {
        $this->app->getEvent()->occur(I_Event::POST_SYS);
    }
}
