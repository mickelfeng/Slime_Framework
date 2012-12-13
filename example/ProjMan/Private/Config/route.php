<?php
use Slime\Framework\Route as R;

return array(
    R::DETAIL => array(
        'R:#^(^/.*)/(^/.*)\.(^\?.*)#' => array(
            R::CALLBACK => array('$1_$2','@METHOD@'),
            R::ARGS     => array('ext' => '$3', 'custom' => 'app1_$3')
        ),
    ),
    R::MODE_AUTO => false, //开启自动路由
    R::MODE_CUSTOM => true, //开启自定义路由
    R::ATTEMPT_OTHER_MODE => true, //失败后尝试另一种模式
    R::PRI_MODE => R::MODE_AUTO //优先选择模式
);
