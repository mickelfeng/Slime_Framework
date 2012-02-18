<?php
use \SF\Blog\Logic as Logic;
use \SF\System\Utils as Utils;

$r = \SF\System\Framework\Bootstrap::instance()->route;

switch ($r->segment(1))
{
    case '':
    case 'index.html':
        return \Logic\Main::main();
        break;
    case 'show':
        if (Utils\Validator::interger($r->segment(2))) return Logic\Show::main();
        break;
    default:
        throw new \Exception();
}
