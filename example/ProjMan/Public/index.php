<?php
use Slime\Framework\Bootstrap;
use Slime\Framework\App;

//@todo register autoloader
$app = new App(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'Private');
$bootstrap = new Bootstrap($app);
$bootstrap->run();
