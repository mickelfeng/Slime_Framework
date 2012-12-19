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
        $this->callable = $callable;
        $this->args = $args;
    }

    public function call()
    {
        return call_user_func_array($this->callable, $this->args);
    }
}