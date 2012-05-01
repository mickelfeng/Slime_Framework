<?php
namespace Sys\Cli;

class Input implements \Sys\I_Context
{
    public static function createInstance(array $config)
    {
        return new self();
    }

    public function __construct()
    {
    }
}