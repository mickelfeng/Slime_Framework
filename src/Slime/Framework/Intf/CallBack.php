<?php
namespace Slime\Framework\Intf;

interface CallBack
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

    /**
     * @return bool
     */
    public function isValidate();
}