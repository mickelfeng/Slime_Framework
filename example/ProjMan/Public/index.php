<?php
use Slime\Framework\Factory as F;

use Slime\Framework\Impl\App;
use Slime\Framework\Impl\CallBack;
use Slime\Framework\Impl\Config;
use Slime\Framework\Impl\Event;
use Slime\Framework\Impl\I18n;
use Slime\Framework\Impl\Log;
use Slime\Framework\Impl\Profile;
use Slime\Framework\Impl\Route;

define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', dirname(dirname(__FILE__)) . DS . 'Private');
define('DIR_CONFIG', DIR_APP . DS . 'Config');

$CFG = new Config(DIR_CONFIG);
$APP = new App(
    F::Cache($CFG->get('cache.default.name'), $CFG->get('cache.default.args')),
    new CallBack(),
    $CFG,
    new Event,
    new I18n($CFG->get('lang.default')),
    new Log,
    new Profile,
    new Route
);

$APP->run();
