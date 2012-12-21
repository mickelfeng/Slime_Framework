<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\RDB as I_RDB;

class NoRDB_MySQL implements I_RDB
{
    public function query($select, $table, $join, $where, $groupBy, $offset, $limit, $order)
    {
        // TODO: Implement query() method.
    }

    public function insert($table, $mapKeysValues)
    {
        // TODO: Implement insert() method.
    }

    public function update($table, $mapKeysValues, $where)
    {
        // TODO: Implement update() method.
    }

    public function delete($table, $where)
    {
        // TODO: Implement delete() method.
    }

    public function execCustom($sql)
    {
        // TODO: Implement execCustom() method.
    }

    public function beginTransaction()
    {
        // TODO: Implement beginTransaction() method.
    }

    public function rollBack()
    {
        // TODO: Implement rollBack() method.
    }
}