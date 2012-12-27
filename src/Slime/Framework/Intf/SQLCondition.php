<?php
namespace Slime\Framework\Intf;

interface SqlCondition
{
    /**
     * @param string $k
     * @param string|int|array $v string|int : value; array : in() ignore equ
     * @param string|bool $equ string:k equ v; false:k v
     * @return $this
     */
    public function set($k, $v, $equ = '=');

    /**
     * @param SqlCondition $sqlCondition
     * @return $this
     */
    public function setSub(SqlCondition $sqlCondition);

    /**
     * @param string $logic
     * @return $this
     */
    public function setLogic($logic = 'AND');

    /**
     * @return string
     */
    public function generate();
}