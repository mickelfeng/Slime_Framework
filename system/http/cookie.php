<?php
namespace SF\System\Http;

class Cookie extends \ArrayObject
{
    public function __construct($cookie = null)
    {
        if ($cookie === null)
        {
            $cookie = &$_COOKIE;
        }
        parent::__construct($_COOKIE);
    }

    public function getString()
    {
        ;
    }

    public function __toString()
    {
        ;
    }
}
