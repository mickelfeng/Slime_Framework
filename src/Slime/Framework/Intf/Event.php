<?php
namespace Slime\Framework\Intf;

Interface Event
{
    CONST PRE_SYS  = 'pre_system';
    CONST PRE_APP  = 'pre_app';
    CONST POST_APP = 'post_app';

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