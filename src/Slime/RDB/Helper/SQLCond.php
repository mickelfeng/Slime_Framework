<?php
namespace Slime\RDB;

class Helper_SqlCond
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
        return $this;
    }

    /**
     * @param Helper_SqlCond $sqlCondition
     * @return $this
     */
    public function setSub(Helper_SqlCond $sqlCondition)
    {
        $this->data[] = (string)$sqlCondition;
        return $this;
    }

    /**
     * @param string $logic
     * @return $this
     */
    public function setLogic($logic = 'AND')
    {
        $this->logic = $logic;
        return $this;
    }

    /**
     * @return string
     */
    public function toString()
    {
        $string = empty($this->data) ? '1' : implode(") {$this->logic} (", $this->data);
        return '(' . $string . ')';
    }
}