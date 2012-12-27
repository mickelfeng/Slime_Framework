<?php
namespace Slime\Framework\Impl;

class RDB_SQL_MySQL implements \Slime\Framework\Intf\SQL
{
    protected $select = '*';
    protected $table;
    protected $groupBy = '';
    protected $where = '(1)';
    protected $limit = '';
    protected $orderBy = '';

    /**
     * @param string $string
     * @return $this
     */
    public function select($string)
    {
        $this->select = $string;
        return $this;
    }

    /**
     * @param string $mainTable
     * @param array $joinTable [tableName => cond, L:tableName => cond] LRIO:(left/right/full join)
     * @return $this
     */
    public function table($mainTable, array $joinTable = array())
    {
        $this->table = $mainTable;
        if (!empty($joinTable)) {
            foreach ($joinTable as $tableName => $condition) {
                $joinType = 'JOIN';
                if (strlen($tableName) > 2 && $tableName[1]==':') {
                    switch ($tableName[0]) {
                        case 'L':
                            $joinType = 'LEFT JOIN';
                            break;
                        case 'R':
                            $joinType = 'RIGHT JOIN';
                            break;
                        case 'F':
                            $joinType = 'FULL JOIN';
                            break;
                    }
                    $tableName = substr($tableName, 2);
                }

                $this->table .= " $joinType $tableName ON $condition";
            }
        }

        return $this;
    }

    /**
     * @param string $string
     * @param \Slime\Framework\Intf\SQLCondition $having
     * @return $this
     */
    public function groupBy($string, \Slime\Framework\Intf\SQLCondition $having = null)
    {
        $this->groupBy = 'GROUP BY ' . $string;
        if ($having !== null) {
            $this->groupBy .= ' HAVING ' . $having->generate();
        }
    }

    /**
     * @param \Slime\Framework\Intf\SQLCondition $condition
     * @return $this
     */
    public function where(\Slime\Framework\Intf\SQLCondition $condition)
    {
        $this->where = $condition->generate();
    }

    /**
     * @param int $limit
     * @param int $offset
     * @return $this
     */
    public function limit($limit, $offset = 0)
    {
        $this->limit = sprintf('LIMIT %d OFFSET %d', $limit, $offset);
        return $this;
    }

    /**
     * @param $string
     * @return $this
     */
    public function orderBy($string)
    {
        $this->orderBy = 'ORDER BY ' . $string;
        return $this;
    }

    /**
     * @param string $asTmp
     * @return mixed
     */
    public function generate($asTmp = '')
    {
        return sprintf(
            "SELECT %s FROM %s WHERE %s %s %s %s",
            $this->select, $this->table, $this->where, $this->groupBy, $this->limit, $this->orderBy
        );
    }
}