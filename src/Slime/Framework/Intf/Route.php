<?php
namespace Slime\Framework\Intf;

interface Route
{
    const MODE_AUTO = 1;
    const AUTO_TYPE = 2;
    const MODE_CUSTOM = 3;
    const CUSTOM_DETAIL = 4;
    const CUSTOM_MAP = 5;
    const ATTEMPT_OTHER_MODE = 6;
    const PRI_MODE = 7;

    const CALLBACK = 0;
    const ARGS = 1;

    /**
     * @param $routeConfig
     * @param CallBack $callback
     * @return mixed
     */
    public function generate($routeConfig, CallBack $callback);
}
