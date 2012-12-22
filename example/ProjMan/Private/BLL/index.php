<?php
namespace ProjMan;

use SLime\Framework\Impl\App as I_App;

class BLL_Index
{
    public static function get(I_App $app, $ext, $custom)
    {
        echo $ext . $custom;
    }
}
