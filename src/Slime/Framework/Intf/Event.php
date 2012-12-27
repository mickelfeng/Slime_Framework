<?php
namespace Slime\Framework\Intf;

Interface Event
{
    CONST PRE_SYSTEM  = 'pre_system';
    CONST PRE_APP  = 'pre_app';
    CONST PRE_BLL  = 'pre_bll';
    CONST POST_APP = 'post_app';
    CONST POST_SYSTEM = 'post_system';

    /**
     * @param string $name
     * @return mixed
     */
    public function occur($name);

    /**
     * @param string $name
     * @param \Slime\Framework\Intf\CallBack $callback
     * @return void
     */
    public function set($name, CallBack $callback);

    /**
     * @param CallBack[] $mapNameCallback
     * @return void
     */
    public function setMulti($mapNameCallback);

    public function delete($name);
}