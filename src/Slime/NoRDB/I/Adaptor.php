<?php
namespace Slime\NoRDB;

interface I_Adaptor
{
    public function find($document, $pk);

    public function save($document, $value, $pk = null);

    public function findByQuery($document, $condition);
}