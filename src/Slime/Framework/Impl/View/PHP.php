<?php
namespace Slime\Framework\Impl;

use SLime\Framework\Intf\View as I_View;

class View_PHP implements I_View
{
    private $tpl;
    private $data = array();

    /**
     * @param string $k
     * @param mixed $v
     * @param bool $replace
     * @return void
     */
    public function addData($k, $v, $replace = true)
    {
        if (!isset($this->data[$k]) || (isset($this->data[$k]) && $replace)) {
            $this->data[$k] = $v;
        }
    }

    /**
     * @param array $mapKV
     * @param bool $replace
     * @return void
     */
    public function addDatas(array $mapKV, $replace = true)
    {
        $replace ? $this->data = array_merge($this->data, $mapKV) : array($mapKV, $this->data);
    }

    /**
     * @param string $tpl
     * @return void
     */
    public function setTpl($tpl)
    {
        $this->tpl = $tpl;
    }

    /**
     * @return string
     */
    public function render()
    {
        $data = $this->data;
        ob_start();
        require $this->tpl;
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }
}