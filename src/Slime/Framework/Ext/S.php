<?php
/**
 * @method static \Slime\Framework\Intf\App App()
 * @method static \Slime\Framework\Intf\Config Config()
 * @method static \Slime\Framework\Intf\Event Event()
 * @method static \Slime\Framework\Intf\Route Route()
 * @method static \Slime\Framework\Intf\CallBack CallBack()
 */
class S
{
    protected static $instances = array();

    public static $mapCallNamespace = array(
        'App,Config,Event,Route,CallBack' => '\\Slime\\Framework\\Impl\\',
    );

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