<?php
class Singleton
{
    protected static $instances = array();

    protected static $mapCallNamespace = array();

    public static function __callStatic($name)
    {
        if (!isset(self::$instances[$name])) {
            $NS = "\\";
            foreach (self::$mapCallNamespace as $k=>$v) {
                $tmpArr = array_flip(explode(',', $k));
                if (isset($tmpArr[$k])) {
                    $NS = $v;
                    break;
                }
            }
            $className = $NS . $name;
            self::$instances[$name] = new $className();
        }
        return self::$instances[$name];
    }
}