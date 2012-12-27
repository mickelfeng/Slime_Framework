<?php
namespace Slime\Framework\Impl;

use Slime\Framework\Intf\CallBack as I_CallBack;
use Slime\Framework\Intf\Route as I_Route;

class Route implements I_Route
{
    protected $customMap = array();

    /**
     * @var array
     */
    protected $routeConfig;

    /**
     * @var I_CallBack
     */
    protected $callback;

    /**
     * @param array $routeConfig
     */
    public function __construct(array $routeConfig)
    {
        $this->routeConfig = $routeConfig;
    }

    /**
     * @param \Slime\Framework\Intf\CallBack $callback
     * @return void
     */
    public function generate(I_CallBack $callback)
    {
        $this->customMap = $this->routeConfig[I_Route::CUSTOM_MAP];
        $this->callback = $callback;
        php_sapi_name()=='cli' ?
            $this->generateFromCli():
            $this->generateFromHttp();
    }

    private function generateFromHttp()
    {
        $modes = array();
        if ($this->routeConfig[self::MODE_AUTO] && $this->routeConfig[self::MODE_CUSTOM]) {
            $p1 = isset($routeConfig[self::PRI_MODE]) ? self::PRI_MODE : self::MODE_AUTO;
            $modes[] = $p1;
            if ($routeConfig[self::ATTEMPT_OTHER_MODE]) {
                $modes[] = $p1===self::MODE_AUTO ? self::MODE_CUSTOM : self::MODE_AUTO;
            }
        } elseif ($this->routeConfig[self::MODE_AUTO]) {
            $modes[] = self::MODE_AUTO;
        } elseif ($this->routeConfig[self::MODE_CUSTOM]) {
            $modes[] = self::MODE_CUSTOM;
        }

        $requestUri = $_SERVER['REQUEST_URI'];
        foreach ($modes as $mode) {
            $mode===self::MODE_AUTO ?
                $this->parseAutomatic($requestUri, $this->routeConfig[self::AUTO_TYPE]) :
                $this->parseCustom($requestUri);
            if ($this->callback->isValidate()) {
                break;
            }
        }
    }

    private function generateFromCli()
    {
        ;
    }

    private function parseAutomatic()
    {
        $result = false;

        return $result;
    }

    private function parseCustom($requestUri)
    {
        foreach ($this->routeConfig[self::CUSTOM_DETAILS] as $rule => $data) {
            if (preg_match($rule, $requestUri, $match)) {
                unset($match[0]);
                $replaceAll = array_merge($match, $this->customMap);
                if (is_array($data[self::CALLBACK])) {
                    $callable = array(
                        $this->parseReplace($data[self::CALLBACK][0], $replaceAll),
                        $this->parseReplace($data[self::CALLBACK][1], $replaceAll)
                    );
                } else {
                    $callable = $this->parseReplace($data[self::CALLBACK], $replaceAll);
                }
                $args = array();
                foreach ($data[self::ARGS] as $k=>$arg) {
                    $args[$k] = $this->parseReplace($arg, $match);
                }
                $this->callback->setCallable($callable);
                $this->callback->setArgs($args);
            }
        }
    }

    private function parseReplace($strSource, array $replaceAll)
    {
        $blocks = $this->parseBlocks($strSource);
        $arrFind = $arrReplace = array();
        foreach ($blocks as $block) {
            if (isset($replaceAll[$block])) {
                $arrFind[] = $block;
                $arrReplace[] = $replaceAll[$block];
            }
        }
        return str_replace($arrFind, $arrReplace, $strSource);
    }

    private function parseBlocks($string)
    {
        if (preg_match_all('#[^$]($\d+)#', $string, $match)) {
            unset($match[0]);
        }
        $match1 = array();
        /*
         * @todo how to set innerReplace
        $re = implode(self::$innerReplace, '|');
        if (preg_match_all("#($re)#", $string, $match1)) {
            unset($match1[0]);
        }*/
        return array_merge($match, $match1);
    }
}
