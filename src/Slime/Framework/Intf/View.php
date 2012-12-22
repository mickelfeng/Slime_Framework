<?php
namespace Slime\Framework\Intf;

interface View
{
    /**
     * @param string $k
     * @param mixed $v
     * @param bool $replace
     * @return void
     */
    public function addData($k, $v, $replace = true);

    /**
     * @param array $mapKV
     * @param bool $replace
     * @return void
     */
    public function addDatas(array $mapKV, $replace = true);

    /**
     * @param string $tpl
     * @return void
     */
    public function setTpl($tpl);

    /**
     * @return string
     */
    public function render();
}