<?php
namespace Slime\Framework;

class Route implements I_Route
{
    const MODE_AUTO = 1;
    const AUTO_NS = 2;
    const AUTO_DEFAULT = 3;
    const AUTO_PREFIX = 4;

    const CUSTOM_DETAILS = 5;
    const CUSTOM_MAP = 6;

    const CALLBACK = 0;
    const ARGS = 1;

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
     * @param I_CallBack $callback
     * @return void
     */
    public function generate(I_CallBack $callback)
    {
        $this->callback = $callback;
        php_sapi_name()=='cli' ?
            $this->generateFromCli():
            $this->generateFromHttp();
    }

    private function generateFromHttp()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        !empty($this->routeConfig[self::MODE_AUTO]) ?
            $this->parseAutomatic($requestUri) :
            $this->parseCustom($requestUri);
    }

    private function generateFromCli()
    {
        ;
    }

    private function parseAutomatic($requestUri)
    {
        if (($arr = parse_url($requestUri))===false) {
            throw new \RuntimeException();
        }
        $path = ltrim($arr['path'], '/');
        if ($path && $path[strlen($path)-1]=='/') {
            $path .= $this->routeConfig[self::AUTO_DEFAULT];
        }
        $ext = '';
        if (($pos = strpos($path, '.'))!==false) {
            $ext = substr($path, $pos+1);
            $path = substr($path, 0, $pos);
        }
        $className = '\\' . $this->routeConfig[self::AUTO_NS] . '\\' .
            ($path==='' ?
                $this->routeConfig[self::AUTO_DEFAULT]:
                str_replace('/', '_', $path)
            );

        $callable = array(
            0 => $className,
            1 => strtolower($_SERVER['REQUEST_METHOD'])
        );

        $this->callback->setCallable($callable);
        $this->callback->setArgs(array('__EXT__' => $ext));
    }

    private function parseCustom($requestUri)
    {
        foreach ($this->routeConfig[self::CUSTOM_DETAILS] as $rule => $data) {
            if (preg_match($rule, $requestUri, $match)) {
                unset($match[0]);
                if (is_array($data[self::CALLBACK])) {
                    $callable = array(
                        $this->parseReplace($data[self::CALLBACK][0], $match),
                        $this->parseReplace($data[self::CALLBACK][1], $match)
                    );
                } else {
                    $callable = $this->parseReplace($data[self::CALLBACK], $match);
                }
                $args = array();
                foreach ($data[self::ARGS] as $k=>$arg) {
                    $args[$k] = $this->parseReplace($arg, $match);
                }
                $this->callback->setCallable($callable);
                $this->callback->setArgs($args);
                break;
            }
        }
    }

    private function parseReplace($strSource, array $replaceAll)
    {
        $replaceAll += $this->routeConfig[self::CUSTOM_MAP];
        $blocks = $this->parseBlocks($strSource);

        $arrFind = $arrReplace = array();
        foreach ($blocks as $block) {
            if (isset($replaceAll[$block])) {
                $arrFind[] = is_numeric($block) ? "\${$block}" : $block;
                $arrReplace[] = $replaceAll[$block];
            }
        }
        return str_replace($arrFind, $arrReplace, $strSource);
    }

    private function parseBlocks($string)
    {
        preg_match_all('#\$(\d+)#', $string, $match);
        $result = isset($match[1]) ? $match[1] : array();
        foreach ($this->routeConfig[self::CUSTOM_MAP] as $k=>$v) {
            if (strstr($string, $k)) {
                $result[] = $k;
            }
        }
        return $result;
    }
}
