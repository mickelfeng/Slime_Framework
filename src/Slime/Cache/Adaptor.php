<?php
namespace Slime\Cache;

abstract class Adaptor
{
    protected $disabled = false;

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

    /**
     * @return bool
     */
    public function isDisabled()
    {
        return $this->disabled;
    }
}