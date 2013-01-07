<?php
namespace Slime\RDB;

class PDO
{
    const EVENT_PRE_QUERY = 'Slime_RDB_PDO:pre_query';
    const EVENT_POST_QUERY = 'Slime_RDB_PDO:post_query';
    const EVENT_PRE_EXEC = 'Slime_RDB_PDO:pre_exec';
    const EVENT_POST_EXEC = 'Slime_RDB_PDO:post_exec';

    /** @var \PDO */
    protected $instance;

    /** @var array */
    protected $configs;

    /** @var \Slime\Framework\I_Event|null */
    protected $Event;

    /**
     * @param array $configs
     * @param \Slime\Framework\I_Event|null $Debugger
     */
    public function __construct(array $configs = array(), $Event = null)
    {
        $this->configs = $configs;
        if ($Event) {
            $this->Event = $Event;
        }
    }

    public function query($sql, $isOneRow = false, $colNumber = -1)
    {
        $sql = (string)$sql;
        $this->Event && $this->Event->occur(self::EVENT_PRE_QUERY, $sql);
        $stmt = $this->getInstance()->query($sql);
        $this->Event && $this->Event->occur(self::EVENT_POST_QUERY, $sql, $stmt);

        return $isOneRow ?
            ($colNumber >= 0 ?
                $stmt->fetch(\PDO::FETCH_COLUMN, $colNumber) :
                $stmt->fetch(\PDO::FETCH_ASSOC)
            ):
            ($colNumber >= 0 ?
                $stmt->fetchAll(\PDO::FETCH_COLUMN, $colNumber):
                $stmt->fetch(\PDO::FETCH_ASSOC)
            );
    }

    public function execute($sql)
    {
        $sql = (string)$sql;
        $this->Event && $this->Event->occur(self::EVENT_PRE_EXEC, $sql);
        $result = $this->getInstance()->exec($sql);
        $this->Event && $this->Event->occur(self::EVENT_PRE_EXEC, $sql, $result);
        return $result;
    }

    public function getInstance()
    {
        if (!$this->instance) {
            $this->instance = new \PDO($this->configs['dsn'], $this->configs['username'], $this->configs['passwd'], $this->configs['options']);
        }
        return $this->instance;
    }
}
