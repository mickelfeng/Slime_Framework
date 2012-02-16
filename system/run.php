<?php
namespace SF\System;

class Run
{
    public function __construct()
    {
        $bootstrap = new Framework\Bootstrap();
        if (substr(php_sapi_name(), 0, 3) == 'cgi')
        {
            $bootstrap->cgiRun();
        }
        else
        {
            $bootstrap->cliRun();
        }
    }

    public function __destruct()
    {
        ;
    }
}
