<?php
namespace Sys\App;

abstract class CGI_Controller
{
    protected $_data;

    public function __construct()
    {
        ;
    }

    protected function get()
    {
        ;
    }

    protected function put()
    {
        ;
    }

    protected function post()
    {
        ;
    }

    protected function delete()
    {
        ;
    }

    protected function assign($k, $v, $type = '')
    {
        ;
    }

    protected function stick(array $apps)
    {
        //@todo 不同 getInstance($name)
        if (isset($apps[\Sys\Context::getInstance()->getRoute()->getApp()]))
        {
            $this->__destruct(false);
        }
    }

    public function __destruct($render = true)
    {
        if ($render)
        {
            //@todo render
        }
        else
        {
            return $this->_data;
        }
    }
}