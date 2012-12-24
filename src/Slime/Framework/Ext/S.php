<?php
/**
 * @method static \Slime\Framework\Intf\App App($namespace = null)
 * @method static \Slime\Framework\Intf\Config Config($namespace = null)
 * @method static \Slime\Framework\Intf\Event Event($namespace = null)
 * @method static \Slime\Framework\Intf\Route Route($namespace = null)
 * @method static \Slime\Framework\Intf\CallBack CallBack($namespace = null)
 */
class S
{
    protected static $instances = array();

    public static $defaultNameSpace = '\\Slime\\Framework\\Impl\\';

    public static function __callStatic($name, $args)
    {
        if (!isset(self::$instances[$name])) {
            $className = (
                isset($args[0]) ?
                    '\\' . str_replace('.', '\\', trim($args[0], '.')) . '\\' :
                    self::$defaultNameSpace
            ) . $name;
            self::$instances[$name] = new $className();
        }
        return self::$instances[$name];
    }
}