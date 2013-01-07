<?php
namespace Slime\Cache;

class Factory
{
    /**
     * @param string $adaptorName
     * @param mixed $configs
     * @return I_Adaptor
     */
    public static function makeInstance($adaptorName, $configs = null)
    {
        $adaptorName = __NAMESPACE__ . '\Adaptor_' . $adaptorName;
        return new $adaptorName($configs);
    }
}