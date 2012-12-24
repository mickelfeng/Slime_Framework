<?php
namespace Slime\Framework\Intf;

interface _Void
{
    /**
     * @return void
     */
    public function enable();

    /**
     * @return void
     */
    public function disable();

    /**
     * @return bool
     */
    public function isDisabled();
}