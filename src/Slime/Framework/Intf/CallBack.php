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
     * @param $isClassInstantiate bool
     * @return mixed
     */
    public function call($isClassInstantiate = false);

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