<?php
namespace Slime\Framework\Module;

class Route
{
    //@todo delete
    private static $innerReplace = array(
        '@METHOD' => 'xxx',
        '@LANG' => '',
        '@UA' => '',
    );

    const MODE_AUTO = 1;
    const AUTO_TYPE = 2;
    const MODE_CUSTOM = 3;
    const CUSTOM_DETAIL = 4;
    const CUSTOM_MAP = 5;
    const ATTEMPT_OTHER_MODE = 6;
    const PRI_MODE = 7;

    const AUTO_TYPE_1 = 1;
    const AUTO_TYPE_2 = 2;
    const AUTO_TYPE_3 = 2;

    const CALLBACK = 0;
    const ARGS = 1;

    public $file;

    public $callback;

    public $args = array();

    private function __construct()
    {
        ;
    }

    public static function factoryFromHttpRequest($routeConfig, $bllDir, $innerReplace = array())
    {
        $modes = array();
        if ($routeConfig[self::MODE_AUTO] && $routeConfig[self::MODE_CUSTOM]) {
            $p1 = isset($routeConfig[self::PRI_MODE]) ? self::PRI_MODE : self::MODE_AUTO;
            $modes[] = $p1;
            if ($routeConfig[self::ATTEMPT_OTHER_MODE]) {
                $modes[] = $p1===self::MODE_AUTO ? self::MODE_CUSTOM : self::MODE_AUTO;
            }
        } elseif ($routeConfig[self::MODE_AUTO]) {
            $modes[] = self::MODE_AUTO;
        } elseif ($routeConfig[self::MODE_CUSTOM]) {
            $modes[] = self::MODE_CUSTOM;
        } else {
            throw new RuntimeException('All mode is disabled in config');
        }

        //@todo self::innerReplace

        $route = new self();
        $requestUri = $_SERVER['REQUEST_URI'];
        $result = false;
        foreach ($modes as $mode) {
            $result = $mode===self::MODE_AUTO ?
                self::parseAutomatic($route, $requestUri, $routeConfig[self::AUTO_TYPE]) :
                self::parseCustom($route, $requestUri, $routeConfig[self::CUSTOM_DETAIL], $innerReplace);
            if ($result) {
                break;
            }
        }
        if (!$result) {
            throw new RuntimeException('No url matched');
        }

        return $route;
    }

    private static function parseAutomatic(Route $obj, $requestUri, $mode)
    {
        $result = false;

        return $result;
    }

    private static function parseCustom(Route $obj, $requestUri, $rules, $innerReplace)
    {
        foreach ($rules as $rule => $data) {
            $ruleType = substr($rule, 0, 2);
            $ruleDetail = substr($rule, 2);
            switch ($ruleType) {
                case 'R:':
                    if (preg_match($rule, $requestUri, $match)) {
                        unset($match[0]);
                        $match += self::$innerReplace;
                        if (is_array($data[self::CALLBACK])) {
                            $obj->callback = array(
                                self::parseReplace($data[self::CALLBACK][0], $match),
                                self::parseReplace($data[self::CALLBACK][1], $match)
                            );
                        } else {
                            $obj->callback = self::parseReplace($data[self::CALLBACK], $match);
                        }
                        foreach ($data[self::ARGS] as $k=>$arg) {
                            $obj->args[$k] = self::parseReplace($arg, $match);
                        }
                        return true;
                        break;
                    }
                    break;
                case 'C:':
                    break;
            }
        }
        return false;
    }

    private static function parseReplace($strSource, array $replaceAll)
    {
        $blocks = self::parseBlocks($strSource);
        $arrFind = $arrReplace = array();
        foreach ($blocks as $block) {
            if (isset($replaceAll[$block])) {
                $arrFind[] = $block;
                $arrReplace[] = $replaceAll[$block];
            }
        }
        return str_replace($arrFind, $arrReplace, $strSource);
    }

    private static function parseBlocks($string)
    {
        if (preg_match_all('#[^$]($\d+)#', $string, $match)) {
            unset($match[0]);
        }
        $re = implode(self::$innerReplace, '|');
        if (preg_match_all("#($re)#", $string, $match1)) {
            unset($match1[0]);
        }
        return $match + $match1;
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
        return call_user_func(array($this->callback), $this->args);
    }
}
