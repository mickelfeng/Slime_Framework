<?php
namespace Slime\RDB;

interface Helper_I_SQL
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
     * @param Helper_SqlCond|string $having
     * @return $this
     */
    public function groupBy($string, $having = '');

    /**
     * @param Helper_SqlCond|string $condition
     * @return $this
     */
    public function where($condition);

    /**
     * @param int $limit
     * @param int $offset
     * @return $this
     */
    public function limit($limit, $offset = 0);

    /**
     * @param string $string
     * @return $this
     */
    public function orderBy($string);

    /**
     * @param array $datas
     * @return $this
     */
    public function insert(array $datas);

    /**
     * @param array $datas
     * @param Helper_SqlCond|string $condition
     * @return $this
     */
    public function update(array $datas, $condition);

    /**
     * @param Helper_SqlCond|string $condition
     * @return $this
     */
    public function delete($condition);

    public function __toString();
}