<?php
namespace Slime\Framework;

class Route
{
    public $file;

    public $callback;

    public $params = array();

    private function __construct()
    {
        ;
    }

    public static function FactoryFromHttpRequest($rulesConfig, $bllDir)
    {
        $route = new self();

        //@todo

        return $route;
    }

    private static function parseCustomRules(Route $obj, $rulesMap, $bllDir)
    {
        $result = false;
        foreach ($rulesMap as $ruleItem) {
            switch ($ruleItem['type']) {
                case 'WIELD':
                    break;
                case 'REG':
                    break;
                case 'CALLBACK':
                    break;
            }
        }
        return $result;
    }

    private static function parseAutomatic(Route $obj, $bllDir)
    {
        return true;
    }

    public static function FactoryFromCliInput(Cli\Input $input)
    {
    }

    public static function Factory($app, $file, $callback, $params)
    {
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return call_user_func(array($this->callback), $this->params);
    }
}
