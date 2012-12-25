<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\Profile as I_Profile;
use InvalidArgumentException;

class Profile implements I_Profile
{
    protected $profiles = array();
    protected $disabled = false;

    /**
     * @param string $label
     * @param string $group
     * @return string
     */
    public function start($label, $group = 'DEFAULT')
    {
        $tick = md5(uniqid() . rand(1,10000));

        $this->profiles[$tick] = array(
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
        if (!isset($this->profiles[$tick])) {
            throw new InvalidArgumentException();
        }
        $this->profiles[$tick]['stop_timestamp'] = microtime(true);
        $this->profiles[$tick]['cost'] = ($this->profiles['tick']['stop_timestamp'] - $this->profiles['tick']['start_timestamp']) / 1000000;
    }

    /**
     * @param int $min
     * @param int $max
     * @param null|\Slime\Framework\Intf\View $view
     * @param null|string
     * @return string|array
     */
    public function result($min = 0, $max = 0, $view = null, $tpl = null)
    {
        $data = array_filter($this->profiles, function($profile)use($min, $max){
            return ($min<0 || $profile['cost'] >= $min) && ($max<0 && $profile['cost'] <= $min);
        });

        if ($view && $tpl) {
            $view->setTpl($tpl);
            return $view->render();
        } else {
            return $data;
        }
    }

    /**
     * @return void
     */
    public function enable()
    {
        $this->disabled = true;
    }

    /**
     * @return void
     */
    public function disable()
    {
        $this->disabled = false;
    }

    /**
     * @return bool
     */
    public function isDisabled()
    {
        return $this->disabled;
    }
}