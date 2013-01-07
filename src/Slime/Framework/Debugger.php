<?php
namespace Slime\Framework;

class Debugger implements I_Debugger
{
    protected $datas = array(
        self::LEVEL_LOG => array(),
        self::LEVEL_NOTICE => array(),
        self::LEVEL_WARN => array(),
        self::LEVEL_ERR => array(),
        self::LEVEL_PROFILE => array()
    );

    /**
     * @param null|int $level
     */
    public function __construct($level = null)
    {
        $level = $level===null ?
            self::LEVEL_LOG|self::LEVEL_NOTICE|self::LEVEL_WARN|self::LEVEL_ERR|self::LEVEL_PROFILE : (int)$level;
        foreach ($this->datas as $k => $v) {
            if (!($k & $level)) {
                $this->datas[$k] = false;
            }
        }
    }

    /**
     * @param $message
     * @return void
     */
    public function log($message)
    {
        if ($this->datas[self::LEVEL_LOG]===false) return;
        $this->datas[self::LEVEL_LOG][] = array('msg' => $message, 'timestamp' => microtime(true), 'level' => self::LEVEL_LOG);
    }

    /**
     * @param $message
     * @return void
     */
    public function notice($message)
    {
        if ($this->datas[self::LEVEL_NOTICE]===false) return;
        $this->datas[self::LEVEL_NOTICE][] = array('msg' => $message, 'timestamp' => microtime(true), 'level' => self::LEVEL_NOTICE);
    }

    /**
     * @param $message
     * @return void
     */
    public function warn($message)
    {
        if ($this->datas[self::LEVEL_WARN]===false) return;
        $this->datas[self::LEVEL_WARN][] = array('msg' => $message, 'timestamp' => microtime(true), 'level' => self::LEVEL_WARN);
    }

    /**
     * @param $message
     * @return void
     */
    public function error($message)
    {
        if ($this->datas[self::LEVEL_ERR]===false) return;
        $this->datas[self::LEVEL_WARN][] = array('msg' => $message, 'timestamp' => microtime(true), 'level' => self::LEVEL_ERR);
    }

    /**
     * @param string $label
     * @param string $group
     * @return string
     */
    public function start($label, $group = 'DEFAULT')
    {
        if ($this->datas[self::LEVEL_PROFILE]===false) return '';
        $tick = md5(uniqid() . rand(1,10000));
        $this->datas[self::LEVEL_PROFILE][$tick] = array(
            'start_timestamp' => microtime(true),
            'label' => $label,
            'group' => $group
        );
        return $tick;
    }


    /**
     * @param $tick
     * @throws \InvalidArgumentException
     * @return void
     */
    public function stop($tick)
    {
        if ($this->datas[self::LEVEL_PROFILE]===false) return;
        if (!isset($this->datas[self::LEVEL_PROFILE][$tick])) {
            throw new \InvalidArgumentException();
        }
        $this->datas[self::LEVEL_PROFILE][$tick]['stop_timestamp'] = microtime(true);
        $this->datas[self::LEVEL_PROFILE][$tick]['cost'] = (
            $this->datas[self::LEVEL_PROFILE][$tick]['stop_timestamp'] -
            $this->datas[self::LEVEL_PROFILE][$tick]['start_timestamp']
        ) / 1000000;
    }

    /**
     * @return string
     */
    public function result()
    {
        foreach ($this->datas as $k => $v) {
            if ($v!==false) {
                echo '<h2>' . $k . '<h2><pre>';
                var_dump($v);
                echo '</pre><hr>';
            }
        }
    }
}