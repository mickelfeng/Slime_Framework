<?php
namespace Slime\Framework\Http;

class Request
{
    public $method;
    public $path;
    public $protocol;
    public $accept;
    public $accept_charset;
    public $accept_encoding;
    public $accept_language;
    public $authorization;
    public $connection;
    public $content_length;
    public $cookie;
    public $host;
    public $if_modified_since;
    public $pragma;
    public $referer;
    public $user_agent;

    public $custom;

    public static function createFromCurrentHttpRequest()
    {
        return new self();
    }

    public function __construct()
    {
        $this->method   = $_SERVER['REQUEST_METHOD'];
        $this->protocol = $_SERVER['SERVER_PROTOCOL'];
        $this->cookie   = new Cookie();
    }

    public function __toString()
    {
        ;
    }

    public function getAllLang()
    {
        ;
    }
}
