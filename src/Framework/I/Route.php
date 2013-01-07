<?php
namespace Slime\Framework;

interface I_Route
{
    /**
     * @param I_CallBack $callback
     * @return void
     */
    public function generate(I_CallBack $callback);
}
