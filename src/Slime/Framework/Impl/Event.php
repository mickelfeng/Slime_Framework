<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\CallBack as I_CallBack;
use Slime\Framework\Intf\Event as I_Event;

class Event implements I_Event
{
    /** @var I_CallBack[] */
    protected $events = array();

    /**
     * @param string $name
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

    /**
     * @param $name
     * @param \Slime\Framework\Intf\CallBack $callback
     * @return void
     */
    public function set($name, I_CallBack $callback)
    {
        $this->events[$name] = $callback;
    }

    /**
     * @param CallBack[] $mapNameCallback
     * @return void
     */
    public function setMulti($mapNameCallback)
    {
        foreach ($mapNameCallback as $name => $callback) {
            $this->events[$name] = $callback;
        }
    }

    public function delete($name)
    {
        if (isset($this->events[$name])) {
            unset($this->events[$name]);
        }
    }
}