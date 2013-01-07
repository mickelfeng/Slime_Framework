<?php
namespace Slime\Framework;

interface I_CallBack
{
    /**
     * @return mixed
     */
    public function getCallable();

    /**
     * @return array
     */
    public function getArgs();

    /**
     * @return mixed
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