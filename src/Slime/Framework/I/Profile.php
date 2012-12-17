<?php
namespace Slime\Framework\I;

interface Profile
{
    /**
     * @param string $label
     * @param string $group
     * @return string
     */
    public function start($label, $group = 'Default');

    /**
     * @param $tick
     * @return void
     */
    public function end($tick);

    public function result($type = null);

    public function filter($minSec = null, $maxSec = null);
}