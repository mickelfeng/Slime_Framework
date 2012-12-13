<?php
use Slime\Framework\Bootstrap;
use Slime\Framework\CTX;
use Slime\Framework\App;
use Slime\Cache;

//@todo register autoloader
$app = new App(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'Private');
$bootstrap = new Bootstrap($app);
$bootstrap->run();
