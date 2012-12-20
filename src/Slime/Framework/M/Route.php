<?php
namespace Slime\Framework;

class M_Route implements I_Route
{
    private $innerReplace = array();

    /**
     * @param array $routeConfig
     * @param I_CallBack $callback
     * @return bool
     */
    public function generate($routeConfig, I_CallBack $callback)
    {
        $this->innerReplace = $routeConfig[I_Route::CUSTOM_MAP];
        if (php_sapi_name()=='cli') {
            return $this->generateFromCli($routeConfig, $callback);
        } else {
            return $this->generateFromHttp($routeConfig, $callback);
        }
    }

    private function generateFromHttp($routeConfig, I_CallBack $callback)
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
        }

        $requestUri = $_SERVER['REQUEST_URI'];
        $result = false;
        foreach ($modes as $mode) {
            $result = $mode===self::MODE_AUTO ?
                $this->parseAutomatic($requestUri, $routeConfig[self::AUTO_TYPE], $callback) :
                $this->parseCustom($requestUri, $routeConfig[self::CUSTOM_DETAIL], $callback);
            if ($result) {
                break;
            }
        }
        return $result;

    }

    private function generateFromCli($routeConfig)
    {
        ;
    }

    private function parseAutomatic($requestUri, $mode, I_CallBack $callback)
    {
        $result = false;

        return $result;
    }

    private function parseCustom($requestUri, $rules, I_CallBack $callback)
    {
        foreach ($rules as $rule => $data) {
            if (preg_match($rule, $requestUri, $match)) {
                unset($match[0]);
                $replaceAll = array_merge($match, $this->innerReplace);
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
                $callback->setCallable($callable)->setArgs($args);
                return true;
            }
        }
        return false;
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
