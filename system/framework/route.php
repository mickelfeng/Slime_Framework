<?php
namespace SF\System\Framework;

class Route
{
    protected  $_request;

    protected $_result;

    public function __construct(\SF\System\Http\Request $request)
    {
        Config::load('main');
        $this->_request = $request;
    }

    public function parseRequest()
    {
        if (!$this->_result)
        {
            $app = Config::get('main.' . $this->_request->host);
            Config::load($app['app'] . '.main');
            $this->_result = '';
        }
        return $this->_result;
    }

    public function getRequest()
    {
        return $this->_request;
    }

    public function segment($number)
    {
        ;
    }

    public function segment_number()
    {
        ;
    }

    public function method()
    {

    }
}
