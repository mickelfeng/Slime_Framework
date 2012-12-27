<?php
# PRE
define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', dirname(dirname(__FILE__)) . DS . 'Private');
define('DIR_CONFIG', DIR_APP . DS . 'Config');

$Config = new \Slime\Framework\Impl\Config(DIR_CONFIG);
$Event = new \Slime\Framework\Impl\Event();
$Event->setMulti($Config->get('event'));

$Route = new \Slime\Framework\Impl\Route($Config->get('route'));
$I18n = new \Slime\Framework\Impl\I18n();

$Event->occur(\Slime\Framework\Impl\Event::PRE_SYSTEM);

# READY
$App = new \Slime\Framework\Impl\App(
    new \Slime\Framework\Impl\CallBack(),
    $Config,
    new \Slime\Framework\Impl\Debugger(),
    $Event,
    $I18n,
    new \Slime\Framework\Impl\Log(),
    $Route
);

# START
$App->run();