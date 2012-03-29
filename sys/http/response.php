<?php
namespace Sys\Http;

class Response implements \Sys\I_Service
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
