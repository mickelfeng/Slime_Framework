<?php
namespace Sys;

class I18n implements I_Context
{
    private $_lang;
    private $_path;
    private $_expr = '%l.lang';

    protected $_storage = array();

    public static function createInstance(array $config)
    {
        return new self($config[0]);
    }

    public function __construct($_lang)
    {
        #$this->loadLangPacket($_lang);
        #$this->setDefaultLang($_lang);
    }

    public function setLangDir($path)
    {
        $this->_path = rtrim($path, '/\\');
    }

    public function setLangFileExpression($expr)
    {
        if (!strstr($expr, '%l') || !strstr($expr, '.'))
        {
            throw new \InvalidArgumentException();
        }
        $this->_expr = $expr;
    }

    public function setDefaultLang($lang)
    {
        $this->_lang = $lang;
        return true;
    }

    public function loadLangPacket($lang)
    {
        if (isset($this->_storage[$lang]))
        {
            return true;
        }
        $file = $this->_path .= '/' . str_replace('%l', $lang, $this->_expr);
        if (!file_exists($file))
        {
            throw new \RuntimeException(sprintf('Language pack [%s:%s] is not exsit!', $lang, $file));
        }
        $this->_storage[$lang] = require $file;
        return true;
    }

    public function get($string, $lang = NULL)
    {
        if (!$lang)
        {
            $lang = $this->_lang;
        }
        if (!isset($this->_storage[$lang]))
        {
            $this->loadLangPacket($lang);
        }

        return isset($this->_storage[$lang][$string]) ? $this->_storage[$lang][$string] : $string;
    }
}
