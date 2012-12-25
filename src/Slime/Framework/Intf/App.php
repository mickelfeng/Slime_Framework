<?php
namespace Slime\Framework\Intf;

interface App
{
    /**
     * @return void
     */
    public function pre();

    /**
     * @return void
     */
    public function run();

    /**
     * @return void
     */
    public function post();
}