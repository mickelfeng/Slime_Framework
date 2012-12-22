<?php
/**
 * @method static \Slime\Framework\Intf\Cache Cache(\string $className, \mixed $arg1) multi arg
 * @method static \Slime\Framework\Intf\NoRDB NoRDB(\string $className, \mixed $arg1) multi arg
 * @method static \Slime\Framework\Intf\RDB RDB(\string $className, \mixed $arg1) multi arg
 */
class Factory
{
    /**
     * @var \ReflectionClass[]
     */
    protected static $refs = array();

    public static function __callStatic($name, $args)
    {
        if (!isset(self::$refs[$name])) {
            self::$refs[$name] = new \ReflectionClass($name);
        }

        return self::$refs[$name]->newInstanceArgs($args);
    }
}
