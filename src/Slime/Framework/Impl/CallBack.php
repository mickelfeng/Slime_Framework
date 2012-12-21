<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\CallBack as I_CallBack;

class CallBack implements I_CallBack
{
    /** @var mixed */
    private $callable;

    /** @var array */
    private $args;

    public function call()
    {
        return call_user_func_array($this->callable, $this->args);
    }

    /**
     * @param mixed $callable
     */
    public function setCallable($callable)
    {
        $this->callable = $callable;
    }

    /**
     * @param array $args
     */
    public function setArgs(array $args)
    {
        $this->args = $args;
    }
}