<?php
namespace Slime\Framework\Intf;

interface NoRDB
{
    public function find($document, $pk);

    public function save($document, $pk, $value);

    public function findByQuery($document, $condition);
}