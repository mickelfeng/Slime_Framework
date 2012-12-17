<?php
namespace Slime\Framework\Module\I;

interface I18n
{
    public function setLangDir($path);

    public function setLangFileExpression($expr);

    public function setDefaultLang($lang);

    public function loadLangPacket($lang);

    public function get($string, $lang = NULL);
}
