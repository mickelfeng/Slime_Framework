<?php
namespace Slime\Framework\Intf;

interface SQL
{
    /**
     * @param string $string
     * @return $this
     */
    public function select($string);

    /**
     * @param string $mainTable
     * @param array $joinTable
     * @return $this
     */
    public function table($mainTable, array $joinTable = array());

    /**
     * @param string $string
     * @param \Slime\Framework\Intf\SQLCondition $having
     * @return $this
     */
    public function groupBy($string, \Slime\Framework\Intf\SQLCondition $having = null);

    /**
     * @param \Slime\Framework\Intf\SQLCondition $condition
     * @return $this
     */
    public function where(\Slime\Framework\Intf\SQLCondition $condition);

    /**
     * @param int $limit
     * @param int $offset
     * @return $this
     */
    public function limit($limit, $offset = 0);

    /**
     * @param $string
     * @return $this
     */
    public function orderBy($string);

    /**
     * @param string $asTmp
     * @return mixed
     */
    public function generate($asTmp = '');
}