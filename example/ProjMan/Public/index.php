<?php
use Slime\Framework\Bootstrap;
use Slime\Framework\App;

//@todo register autoloader
$bootstrap = new Bootstrap(new App(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'Private'));
$bootstrap->run();
