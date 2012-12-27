<?php
namespace Slime\Framework\Impl;

class SqlCondition implements \Slime\Framework\Intf\SqlCondition
{
    protected $data;
    protected $logic = 'AND';

    /**
     * @param string $k
     * @param string|int|array $v string|int : value; array : in() ignore equ
     * @param string|bool $equ string:k equ v; false:k v
     * @return $this
     */
    public function set($k, $v, $equ = '=')
    {
        $this->data[] = $k . (
            is_array($v) ?
                ' IN (' . implode(',', $v) . ')' :
                ($equ===false ? $v : $equ . $v)
        );
    }

    /**
     * @param \Slime\Framework\Intf\SqlCondition $sqlCondition
     * @return $this
     */
    public function setSub(\Slime\Framework\Intf\SqlCondition $sqlCondition)
    {
        $this->data[] = $sqlCondition->generate();
    }

    /**
     * @param string $logic
     * @return $this
     */
    public function setLogic($logic = 'AND')
    {
        $this->logic = $logic;
    }

    /**
     * @return string
     */
    public function generate()
    {
        $string = empty($this->data) ? '1' : implode(") {$this->logic} (", $this->data);
        return '(' . $string . ')';
    }
}