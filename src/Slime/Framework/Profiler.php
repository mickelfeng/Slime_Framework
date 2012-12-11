<?php
namespace Slime\Framework;

class Profiler
{
    private $time = array();

    public function mark($name = '')
    {
        $this->time[] = array(
            'name' => $name,
            'time' => microtime(TRUE)
        );
    }
}