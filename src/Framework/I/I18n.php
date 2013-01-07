<?php
namespace Slime\Framework;

interface I_I18n
{
    public function setLangDir($path);

    public function setLangFileExpression($expr);

    public function setDefaultLang($lang);

    public function loadLangPacket($lang);

    public function get($string, $lang = null);
}
