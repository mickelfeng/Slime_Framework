<?php
namespace Slime\Framework;

interface I_NoRDB
{
    public function find($document, $pk);

    public function save($document, $pk, $value);

    public function findByQuery($document, $condition);
}