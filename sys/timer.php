<?php
class Timer
{
    private $time = array();

    public function inject($name = '')
    {
        $this->time[] = array(
            'name' => $name,
            'time' => microtime(TRUE)
        );
    }
}