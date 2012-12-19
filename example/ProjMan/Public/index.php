<?php
use Slime\Framework\Framework;
use Slime\Framework\M_App;
use Slime\Cache;

//@todo register autoloader
$app = new M_App(
    dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'Private',
    'zh-cn'
);
$bootstrap = new Framework($app);
$bootstrap->run();
