<?php
namespace Slime\Framework\Impl;

class SqlCondition implements \Slime\Framework\Intf\SqlCondition
{
    protected $data;

    /**
     * @param string $k key
     * @param mixed $v string:value; array:in() ignore equ
     * @param mixed $equ string:k equ v; if false:k v
     * @return $this
     */
    public function set($k, $v, $equ = '=')
    {
        // TODO: Implement set() method.
    }

    /**
     * @param \Slime\Framework\Intf\SqlCondition $sqlCondition
     * @return $this
     */
    public function setSub(\Slime\Framework\Intf\SqlCondition $sqlCondition)
    {
        // TODO: Implement setSub() method.
    }

    /**
     * @param string $logic
     * @return $this
     */
    public function setLogic($logic = 'AND')
    {
        // TODO: Implement setLogic() method.
    }

    /**
     * @return string
     */
    public function generate()
    {
    }
}