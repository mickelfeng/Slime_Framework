<?php
namespace Sys\App;

abstract class CLI_Controller
{
    protected $_params;
    protected $_data;

    public function __construct(Sys\Cli\Input $input)
    {
        ;
    }

    abstract public function run();

    protected function log($str)
    {
    }

    public function __destruct()
    {
        ;
    }
}