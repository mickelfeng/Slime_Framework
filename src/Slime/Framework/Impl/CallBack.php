<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\CallBack as I_CallBack;

class CallBack implements I_CallBack
{
    /** @var mixed */
    private $callable;

    /** @var array */
    private $args = array();

    /**
     * @param $isClassInstantiate bool
     * @return mixed
     */
    public function call($isClassInstantiate = false)
    {
        if (!$this->callable) {
            return false;
        }
        return $isClassInstantiate ?
            call_user_func_array(new $this->callable, $this->args):
            call_user_func_array($this->callable, $this->args);
    }

    /**
     * @return mixed
     */
    public function getCallable()
    {
        return $this->callable;
    }

    /**
     * @return array
     */
    public function getArgs()
    {
        return $this->args;
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

    /**
     * @return bool
     */
    public function isValidate()
    {
        return !empty($this->callable);
    }
}