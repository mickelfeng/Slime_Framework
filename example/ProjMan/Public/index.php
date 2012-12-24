<?php
define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', dirname(dirname(__FILE__)) . DS . 'Private');
define('DIR_CONFIG', DIR_APP . DS . 'Config');

S::App()->run();