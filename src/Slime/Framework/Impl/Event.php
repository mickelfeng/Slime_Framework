<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\CallBack as I_CallBack;
use Slime\Framework\Intf\Event as I_Event;

class Event implements I_Event
{
    /** @var I_CallBack[] */
    private $events = array();

    /**
     * @param $name
     * @return mixed
     */
    public function occur($name)
    {
        if (isset($this->events[$name])) {
            return $this->events[$name]->call();
        } else {
            return null;
        }
    }

    public function add($name, I_CallBack $callback)
    {
        // TODO: Implement add() method.
    }

    public function addMulti($mapNameCallback)
    {
        // TODO: Implement addMulti() method.
    }

    public function delete($name)
    {
        // TODO: Implement delete() method.
    }
}