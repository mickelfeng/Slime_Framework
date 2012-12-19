<?php
namespace Slime\Framework;

class M_Event implements I_Event
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