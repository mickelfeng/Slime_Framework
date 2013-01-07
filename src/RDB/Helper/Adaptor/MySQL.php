<?php
namespace Slime\RDB;

class Helper_Adaptor_MySQL implements Helper_I_SQL
{
    protected $select = '*';
    protected $table;
    protected $groupBy = '';
    protected $where = '1';
    protected $limit = '';
    protected $orderBy = '';

    /** @var null|array */
    protected $insert = null;
    /** @var null|array */
    protected $update = null;
    /** @var null|array */
    protected $delete = null;

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
     * @param Helper_SQLCond|string $having
     * @return $this
     */
    public function groupBy($string, $having = '')
    {
        $this->groupBy = 'GROUP BY ' . $string;
        $having = (string)$having;
        if ($having !== '') {
            $this->groupBy .= ' HAVING ' . $having;
        }
    }

    /**
     * @param Helper_SQLCond|string $condition
     * @return $this
     */
    public function where($condition)
    {
        $this->where = (string)$condition;
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
     * @param string $string
     * @return $this
     */
    public function orderBy($string)
    {
        $this->orderBy = 'ORDER BY ' . $string;
        return $this;
    }

    /**
     * @param array $datas
     * @return $this
     */
    public function insert(array $datas)
    {
        $i = key($datas);
        if (!is_int($i)) {
            $datas = array($datas);
        } elseif ($i!=0) {
            $datas = array_values($datas);
        }
        $this->insert = $datas;
    }

    /**
     * @param array $datas
     * @param Helper_SQLCond|string $condition
     * @return $this
     */
    public function update(array $datas, $condition)
    {
        $this->update = $datas;
        $this->where = (string)$condition;
    }

    /**
     * @param Helper_SQLCond|string $condition
     * @return $this
     */
    public function delete($condition)
    {
        $this->delete = true;
        $this->where = (string)$condition;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->delete) {
            $sql = sprintf(
                "DELETE FROM %s WHERE (%s)",
                $this->table, $this->where
            );
        } elseif ($this->insert) {
            $sql = sprintf(
                "INSERT INTO %s %s VALUES (%s)",
                $this->table,
                $this->select!=='*' ? '(' . $this->select . ')' : '',
                implode('),(', $this->insert)
            );
        } elseif ($this->update) {
            $update = array();
            foreach ($this->update as $k=>$v) {
                $update[] = "`$k` = '$v'";
            }
            $sql = sprintf(
                "UPDATE %s SET %s WHERE (%s)",
                $this->table, implode(' AND ', $update), $this->where
            );
        } else {
            $sql = sprintf(
                "SELECT %s FROM %s WHERE (%s) %s %s %s",
                $this->select, $this->table, $this->where, $this->groupBy, $this->limit, $this->orderBy
            );
        }
        return $sql;
    }
}