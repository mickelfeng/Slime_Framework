<?php
use Slime\Framework\Route as R;

return array(
    R::MAP => array(
        'R:#^(^/.*)/(^/.*)\.(^\?.*)#' => array(
            R::CALLBACK => array('$1_$2','@METHOD@'),
            R::ARGS     => array('ext' => '$3', 'custom' => 'app1_$3')
        ),
    ),
    R::AUTO => false, //开启自动路由
    R::CUSTOM => true, //开启自定义路由
    R::ATTEMPT_OTHER => true, //失败后尝试另一种模式
    R::PRI => R::AUTO //优先选择模式
);
