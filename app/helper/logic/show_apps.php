<?php
namespace SF\Helper\Logic;

use \SF\System as Sys;

class Show_Apps extends Sys\App\CLI_Controller
{
    public function run()
    {
        $appName = $this->_params['app'];
    }
}