<?php
namespace Slime\Framework;

use ReflectionClass;

/**
 * @method static I_Cache Cache(\string $className, \mixed $arg1) multi arg
 * @method static I_NoRDB NoRDB(\string $className, \mixed $arg1) multi arg
 * @method static I_RDB RDB(\string $className, \mixed $arg1) multi arg
 */
class Factory
{
    /**
     * @var ReflectionClass[]
     */
    private static $refs = array();

    public static function __callStatic($name, $args)
    {
        if (!isset(self::$refs[$name])) {
            self::$refs[$name] = new ReflectionClass($name);
        }

        return self::$refs[$name]->newInstanceArgs($args);
    }
}
