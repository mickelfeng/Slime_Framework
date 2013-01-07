<?php
namespace Slime\Framework;

class CallBack implements I_CallBack
{
    /** @var mixed */
    private $callable;

    /** @var array */
    private $args = array();

    public function __construct($callable = null, $args = array())
    {
        if ($callable!==null) {
            $this->callable = $callable;
        }
        if (count($args)!==0) {
            $this->args = $args;
        }
    }

    /**
     * @return mixed
     */
    public function call()
    {
        return call_user_func_array($this->callable, $this->args);
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
}