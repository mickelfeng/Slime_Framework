<?php
namespace SF\System\Data_Engine;

class MySQL extends \PDO
{
    protected static $_instances = array();

    public function __construct($dsn, $username, $password, $driver_options = array())
    {
        parent::__construct($dsn, $username, $password, $driver_options);
    }

    public static function factory($key)
    {
        if (!isset(self::$_instances[$key]))
        {
            $db_config = \SF\System\Framework\Config::get('db.' . $key);
            self::$_instances[$key] = new self(
                $db_config['dsn'],
                $db_config['username'],
                $db_config['password'],
                $db_config['driver_options']
            );
        }
        return self::$_instances;
    }

    public static function querySQL($table, $limit, $offset = 0, $where = null, $order = null, $fileds = null, $extends = null)
    {

    }

    public static function insertSQL($table, $values, $keys = null, $extends = null)
    {

    }

    public static function updateSQL($table, $datas, $where = null, $extends = null)
    {

    }

    public static function deleteSQL($table, $datas, $where = null)
    {

    }
}