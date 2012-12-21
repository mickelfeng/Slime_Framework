<?php
namespace Slime\Framework\Intf;

interface I18n
{
    public function setLangDir($path);

    public function setLangFileExpression($expr);

    public function setDefaultLang($lang);

    public function loadLangPacket($lang);

    public function get($string, $lang = null);
}
