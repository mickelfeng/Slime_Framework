<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\Debugger as I_Debugger;

class Debugger implements I_Debugger
{
    const LEVEL_LOG = 0;
    const LEVEL_NOTICE = 1;
    const LEVEL_WARN = 2;
    const LEVEL_ERR = 4;

    protected $datas = array(
        self::LEVEL_LOG => array(),
        self::LEVEL_NOTICE => array(),
        self::LEVEL_WARN => array(),
        self::LEVEL_ERR => array()
    );

    /**
     * @param $message
     * @return void
     */
    public function log($message)
    {
        $this->datas[] = array('msg' => $message, 'timestamp' => microtime(true), 'level' => self::LEVEL_LOG);
    }

    /**
     * @param $message
     * @return void
     */
    public function notice($message)
    {
        $this->datas[] = array('msg' => $message, 'timestamp' => microtime(true), 'level' => self::LEVEL_NOTICE);
    }

    /**
     * @param $message
     * @return void
     */
    public function warn($message)
    {
        $this->datas[] = array('msg' => $message, 'timestamp' => microtime(true), 'level' => self::LEVEL_WARN);
    }

    /**
     * @param $message
     * @return void
     */
    public function error($message)
    {
        $this->datas[] = array('msg' => $message, 'timestamp' => microtime(true), 'level' => self::LEVEL_ERR);
    }

    /**
     * @param int $level
     * @return mixed
     */
    public function result($level = 0)
    {
        $result = array();
        foreach ($this->datas as $data) {
            if ($data['level'] >= $level) {
                $result[] = $data;
            }
        }
        return $result;
    }
}