<?php
namespace Slime\Framework;

interface I_CallBack
{
    /**
     * @return bool
     */
    public function call();

    /**
     * @param mixed $callable
     * @return $this
     */
    public function setCallable($callable);

    /**
     * @param array $args
     * @return $this
     */
    public function setArgs(array $args);
}