<?php
namespace Sys\Cli;

class Input implements \Sys\I_Service
{
    public static function createInstance(array $config)
    {
        return new self();
    }

    public function __construct()
    {
    }
}