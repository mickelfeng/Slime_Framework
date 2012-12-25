<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\App as I_App;
use Singleton;
use Factory;

class App implements I_App
{
    /**
     * @return void
     */
    public function pre()
    {
    }

    /**
     * @return void
     */
    public function run()
    {
        $E   = Singleton::Event();
        $CB  = Factory::CallBack();
        $CFG = Singleton::Config();
        $R   = Singleton::Route();

        $E->occur(Event::PRE_SYS);

        $R->generate($CFG->get('route'), $CB);

        $E->occur(Event::PRE_APP);

        if ($CB->isValidate()) {
            $args = $CB->getArgs();
            array_unshift($args, $this);
            $CB->setArgs($args);
            $CB->call(true);
        }

        $E->occur(Event::POST_APP);
    }

    /**
     * @return void
     */
    public function post()
    {
        // TODO: Implement post() method.
    }
}