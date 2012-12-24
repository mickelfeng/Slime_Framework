<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\Profile as I_Profile;

class Profile implements I_Profile
{
    /**
     * @param string $label
     * @param string $group
     * @return string
     */
    public function start($label, $group = 'Default')
    {
        // TODO: Implement start() method.
    }

    /**
     * @param $tick
     * @return void
     */
    public function stop($tick)
    {
        // TODO: Implement stop() method.
    }

    /**
     * @param mixed $type
     * @return mixed
     */
    public function result($type = null)
    {
        // TODO: Implement result() method.
    }

    /**
     * @return bool
     */
    public function isDisable()
    {
        // TODO: Implement isDisable() method.
    }

    /**
     * @return void
     */
    public function enable()
    {
        // TODO: Implement enable() method.
    }

    /**
     * @return void
     */
    public function disable()
    {
        // TODO: Implement disable() method.
    }

    /**
     * @return bool
     */
    public function isDisabled()
    {
        // TODO: Implement isDisabled() method.
    }
}