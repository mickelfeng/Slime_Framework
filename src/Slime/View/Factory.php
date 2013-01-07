<?php
namespace Slime\View;

class Factory
{
    /**
     * @param string $name
     * @return I_Adaptor
     */
    public static function makeInstance($name)
    {
        $name = __NAMESPACE__ . '\Adaptor_' . $name;
        return new $name();
    }
}