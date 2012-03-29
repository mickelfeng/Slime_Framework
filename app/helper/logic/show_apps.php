<?php
namespace SF\Helper\Logic;

class Show_Apps extends \Sys\App\CLI_Controller
{
    public function run()
    {
        $appName = $this->_params['app'];
    }
}