<?php
namespace Slime\Framework\Impl;

abstract class Cache_
{
    protected $disabled = false;

    /**
     * @return bool
     */
    public function isDisabled()
    {
        return $this->disabled;
    }

    /**
     * @return void
     */
    public function enable()
    {
        $this->disabled = false;
    }

    /**
     * @return void
     */
    public function disable()
    {
        $this->disabled = true;
    }
}