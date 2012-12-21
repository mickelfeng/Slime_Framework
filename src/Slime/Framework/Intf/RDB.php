<?php
namespace Slime\Framework\Intf;

interface RDB
{
    public function query($select, $table, $join, $where, $groupBy, $offset, $limit, $order);

    public function insert($table, $mapKeysValues);

    public function update($table, $mapKeysValues, $where);

    public function delete($table, $where);

    public function execCustom($sql);

    public function beginTransaction();

    public function rollBack();
}