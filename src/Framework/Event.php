<?php
namespace Slime\Framework;

class Event implements I_Event
{
    /** @var I_CallBack[][] */
    protected $events = array();

    /**
     * @param string $name
     * @param array $args
     * @return void
     */
    public function occur($name, array $args = array())
    {
        if (!empty($this->events[$name])) {
            foreach ($this->events[$name] as $callback) {
                /** @var $callback I_CallBack */
                if (count($args)>0) {
                    $orgArgs = $callback->getArgs();
                    $callback->setArgs(count($orgArgs>0) ? array_merge($orgArgs, $args) : $args);
                }
                if (!$callback->call()) {
                    break;
                }
            }
            //unset($this->events[$name]);
        }
    }

    /**
     * @param $point
     * @param I_CallBack|I_CallBack[] $callback
     * @return void
     */
    public function add($point, $callback)
    {
        if ($callback instanceof I_CallBack) {
            $this->events[$point][] = $callback;
        } elseif (is_array($callback)) {
            foreach ($callback as $cb) {
                $this->events[$point][] = $cb;
            }
        }
        $this->events[$point][] = $callback;
    }

    /**
     * @param I_CallBack[][] $events [point:[cb, cb, ..], ..]
     * @return void
     */
    public function addMulti(array $events)
    {
        $this->events = empty($this->events) ? $events : array_merge_recursive($this->events, $events);
    }
}