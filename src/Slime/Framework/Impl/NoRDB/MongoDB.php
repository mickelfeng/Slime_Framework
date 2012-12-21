<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\NoRDB as I_NoRDB;

class NoRDB_MongoDB implements I_NoRDB
{
    public function find($document, $pk)
    {
        // TODO: Implement find() method.
    }

    public function save($document, $pk, $value)
    {
        // TODO: Implement save() method.
    }

    public function findByQuery($document, $condition)
    {
        // TODO: Implement findByQuery() method.
    }
}