<?php
namespace Slime\Framework;

use Slime\I\Cache;

class Route
{
    private static $innerParams = array(
        '@METHOD' => 'xxx',
        '@LANG' => '',
        '@UA' => '',
    );

    const DETAIL = 0;
    const MODE_AUTO = 1;
    const MODE_CUSTOM = 2;
    const ATTEMPT_OTHER_MODE = 3;
    const PRI_MODE = 4;

    const CALLBACK = 0;
    const ARGS = 1;

    public $file;

    public $callback;

    public $args = array();

    private function __construct()
    {
        ;
    }

    public static function factoryFromHttpRequest($rulesConfig, $bllDir)
    {
        $route = new self();

        //@todo

        return $route;
    }

    private static function parseCustomRules(Route $obj, $requestUri, $rulesMap, $bllDir)
    {
        foreach ($rulesMap as $rule => $data) {
            $ruleType = substr($rule, 0, 2);
            $ruleDetail = substr($rule, 2);
            switch ($ruleType) {
                case 'R:':
                    if (preg_match($rule, $requestUri, $match)) {
                        unset($match[0]);
                        $match += self::$innerParams;
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
        $re = implode(self::$innerParams, '|');
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
