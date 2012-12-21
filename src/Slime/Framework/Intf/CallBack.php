<?php
namespace Slime\Framework\Intf;

interface CallBack
{
    /**
     * @return bool
     */
    public function call();

    /**
     * @param mixed $callable
     */
    public function setCallable($callable);

    /**
     * @param array $args
     */
    public function setArgs(array $args);
}