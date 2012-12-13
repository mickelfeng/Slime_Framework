<?php
namespace Slime\Framework;

class Event
{
    CONST PRE_SYS = 'pre_system';
    CONST PRE_APP = 'pre_app';
    CONST POST_APP = 'post_app';
    CONST POST_SYS = 'post_system';

    private $events = array();

    public function callback($name)
    {
        if (isset($this->events[$name])) {
            list($callback, $params) = $this->events[$name];
            call_user_func_array($callback, $params);
        }
    }

    public function add($name, $callback, $params = array())
    {
        $this->events[$name] = array($callback, $params);
    }

    public function addMulti($mapNameCallback)
    {
        foreach ($mapNameCallback as $name=>$callback) {
            $this->events[$name] = $callback;
        }
    }

    public function delete($name)
    {
        if (isset($this->events[$name])) {
            unset($this->events[$name]);
        }
    }

    public function free()
    {
        $this->events = array();
    }

    public function getAllRegisterEvent()
    {
        return array_keys($this->events);
    }
}