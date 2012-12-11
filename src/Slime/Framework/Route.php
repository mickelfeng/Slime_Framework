<?php
namespace Slime\Framework;

class Route
{
    private $file;

    private $callback;

    private $params = array();

    public function getCallback()
    {
        return $this->callback;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getParams()
    {
        return $this->params;
    }

    private function __construct()
    {
        ;
    }

    public static function FactoryFromHttpRequest(I_APP $app, Http\Request $request)
    {
        return new self();
    }

    public static function FactoryFromCliInput(Cli\Input $input)
    {
    }

    public static function Factory($app, $file, $callback, $params)
    {
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return call_user_func(array($this->callback), $this->params);
    }
}
