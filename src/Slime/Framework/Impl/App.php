<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\App as I_App;
use S;

class App implements I_App
{
    /**
     * @return void
     */
    public function run()
    {
        $E   = S::event();
        $CB  = S::callback();
        $CFG = S::config();
        $R   = S::route();

        $E->occur(Event::PRE_SYS);

        $R->generate($CFG->get('route'), $CB);
        $E->occur(Event::PRE_APP);
        $CB->call();

        $E->occur(Event::POST_APP);
    }
}