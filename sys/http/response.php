<?php
namespace Sys\Http;

class Response implements \Sys\I_Context
{
    public static function createInstance(array $config)
    {
        return new self();
    }

    public function __construct()
    {
        ;
    }

    public function send()
    {
        ;
    }

    public function setHeader()
    {
        ;
    }

    public function setBody($body)
    {
        ;
    }
}
