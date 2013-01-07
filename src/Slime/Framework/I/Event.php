<?php
namespace Slime\Framework;

Interface I_Event
{
    CONST PRE_SYSTEM = 'pre_system';
    CONST PRE_APP  = 'pre_app';
    CONST PRE_BLL  = 'pre_bll';
    CONST POST_BLL = 'post_bll';

    /**
     * @param string $name
     * @param array $args
     * @return void
     */
    public function occur($name, array $args = array());

    /**
     * @param $point
     * @param I_CallBack|I_CallBack[] $callback
     * @return void
     */
    public function add($point, $callback);

    /**
     * @param I_CallBack[][] $events [point:[cb, cb, ..], ..]
     * @return void
     */
    public function addMulti(array $events);
}