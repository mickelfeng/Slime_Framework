<?php
namespace Slime\View;

interface I_Adaptor
{
    /**
     * @param string $k
     * @param mixed $v
     * @param bool $replace
     * @return $this
     */
    public function addData($k, $v, $replace = true);

    /**
     * @param array $mapKV
     * @param bool $replace
     * @return $this
     */
    public function addDatas(array $mapKV, $replace = true);

    /**
     * @param string $tplDir
     * @return $this
     */
    public function setTplDir($tplDir);

    /**
     * @param string $tpl
     * @return $this
     */
    public function setTpl($tpl);

    /**
     * @return string
     */
    public function render();
}