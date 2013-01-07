<?php
namespace Slime\View;

class Adaptor_PHP implements I_Adaptor
{
    private $tplDir;
    private $tpl;
    private $data = array();

    /**
     * @param string $k
     * @param mixed $v
     * @param bool $replace
     * @return $this
     */
    public function addData($k, $v, $replace = true)
    {
        if (!isset($this->data[$k]) || (isset($this->data[$k]) && $replace)) {
            $this->data[$k] = $v;
        }
        return $this;
    }

    /**
     * @param array $mapKV
     * @param bool $replace
     * @return $this
     */
    public function addDatas(array $mapKV, $replace = true)
    {
        $replace ? $this->data = array_merge($this->data, $mapKV) : array($mapKV, $this->data);
        return $this;
    }

    /**
     * @param string $tplDir
     * @return $this
     */
    public function setTplDir($tplDir)
    {
        $this->tplDir = $tplDir[strlen($tplDir)-1]==DIRECTORY_SEPARATOR ? $tplDir : ($tplDir . DIRECTORY_SEPARATOR);
    }

    /**
     * @param string $tpl
     * @return $this
     */
    public function setTpl($tpl)
    {
        $this->tpl = $tpl;
        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        extract($this->data);
        ob_start();
        require $this->tplDir . $this->tpl;
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }
}