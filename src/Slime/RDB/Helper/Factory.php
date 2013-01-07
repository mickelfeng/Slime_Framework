<?php
namespace Slime\RDB;

class Helper_Factory
{
    /**
     * @param string $name
     * @return Helper_I_SQL
     */
    public static function makeInstance($name)
    {
        $name = __NAMESPACE__ . '\Helper_Adaptor_' . $name;
        return new $name();
    }
}