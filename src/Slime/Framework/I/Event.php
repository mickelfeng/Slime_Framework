<?php
namespace Slime\Framework\I;

Interface Event
{
    CONST PRE_SYzS = 'pre_system';
    CONST PRE_APP = 'pre_app';
    CONST POST_APP = 'post_app';
    CONST POST_SYS = 'post_system';

    public function occur($name);

    public function add($name, CallBack $callback);

    public function addMulti($mapNameCallback);

    public function delete($name);
}