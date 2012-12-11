<?php
namespace Slime\Framework;

interface I_APP
{
    public function getAppDir();

    public function getConfigDir();

    public function getI18nDir();

    public function getBLLDir();

    public function getDALDir();

    public function getViewDir();
}