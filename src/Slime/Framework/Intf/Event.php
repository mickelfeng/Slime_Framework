<?php
namespace Slime\Framework\Intf;

Interface Event
{
    CONST PRE_SYS  = 'pre_system';
    CONST PRE_APP  = 'pre_app';
    CONST POST_APP = 'post_app';

    public function occur($name);

    public function add($name, CallBack $callback);

    public function addMulti($mapNameCallback);

    public function delete($name);
}