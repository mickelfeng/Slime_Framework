<?php
namespace SF\System\Framework;

class Route
{
    public function __construct($request)
    {
        if ($request instanceof \SF\System\Http\Request)
        {
            ;
        }
        elseif ($request instanceof \SF\System\Cli\Request)
        {
            ;
        }
        else
        {
            throw new \Exception();
        }
        $this->request = $request;
    }

    public function mainLogic()
    {
        ;
    }

    public function pathSegment($index)
    {
        ;
    }

    public function autoRoute()
    {
        ;
    }
}
