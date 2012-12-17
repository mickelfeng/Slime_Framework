<?php
namespace Slime\Framework\Module;

use Slime\Framework\I\Event as IEvent;
use Slime\Framework\I\CallBack as ICallBack;

class Event implements IEvent
{
    public function occur($name)
    {
        // TODO: Implement occur() method.
    }

    public function add($name, ICallBack $callback)
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