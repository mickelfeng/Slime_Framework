<?php
namespace Slime\Framework;

class M_CallBack implements I_CallBack
{
    /** @var mixed */
    private $callable;

    /** @var array */
    private $args;

    /**
     * @param mixed $callable string||[class, string]||[object, string]
     * @param array $args
     */
    public function __construct($callable, array $args = array())
    {
        $this->setCallable($callable);
        $this->setArgs($args);
    }

    public function call()
    {
        return call_user_func_array($this->callable, $this->args);
    }

    /**
     * @param mixed $callable
     * @return I_CallBack
     */
    public function setCallable($callable)
    {
        $this->callable = $callable;
        return $this;
    }

    /**
     * @param array $args
     * @return I_CallBack
     */
    public function setArgs(array $args)
    {
        $this->args;
        return $this;
    }
}