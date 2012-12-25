<?php
namespace Slime\Framework\Intf;

interface Profile extends _Void
{
    const TYPE_DATA = 1;
    const TYPE_HTML = 2;

    /**
     * @param string $label
     * @param string $group
     * @return string
     */
    public function start($label, $group = 'Default');

    /**
     * @param $tick
     * @throws \InvalidArgumentException
     * @return void
     */
    public function stop($tick);

    /**
     * @param int $min
     * @param int $max
     * @param null|View $view
     * @param null|string $tpl
     * @return string|array
     */
    public function result($min = 0, $max = 0, $view = null, $tpl = null);
}