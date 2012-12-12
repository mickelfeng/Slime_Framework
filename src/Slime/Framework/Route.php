<?php
namespace Slime\Framework;

class Route
{
    const MAP = 0;
    const AUTO = 1;
    const CUSTOM = 2;
    const ATTEMPT_OTHER = 3;
    const PRI = 4;

    const CALLBACK = 0;
    const ARGS = 1;

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

    private static function parseCustomRules(Route $obj, $requestUri, $rulesMap, $bllDir)
    {
        $result = false;
        foreach ($rulesMap as $rule => $data) {
            $ruleType = substr($rule, 0, 2);
            $ruleDetail = substr($rule, 2);
            switch ($ruleType) {
                case 'R:':
                    if (preg_match($rule, $requestUri, $match)) {
                        preg
                        $result = true;
                        break;
                    }
                    break;
                case 'C:':
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
