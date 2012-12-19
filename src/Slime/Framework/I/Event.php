<?php
namespace Slime\Framework;

Interface I_Event
{
    CONST PRE_SYS  = 'pre_system';
    CONST PRE_APP  = 'pre_app';
    CONST POST_APP = 'post_app';
    CONST POST_SYS = 'post_system';

    public function occur($name);

    public function add($name, I_CallBack $callback);

    public function addMulti($mapNameCallback);

    public function delete($name);
}