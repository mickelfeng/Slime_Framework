<?php
use Slime\Framework\Framework;
use Slime\Framework\M_App;

//@todo register autoloader
$app = new M_App(
    dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'Private',
    'zh-cn'
);
$framework = new Framework($app);
$framework->run();
