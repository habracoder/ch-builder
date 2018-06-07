<?php

namespace CHBuilder;


use ClickHouseDB\Client;

class Query
{
    private $connection;

    private $sql;
    private $fields;
    private $table;
    private $fromSelect;

    public function __construct(Client $client)
    {
        $this->connection = $client;
    }

    public function setFromSelect($fromSelect)
    {
        $this->fromSelect = $fromSelect;
        $this->prepareSql();
    }

    public function getResult()
    {
        $sth = $this->connection->select($this->sql);

        return $sth->rows();
    }

    public function getSQL()
    {
        return $this->sql;
    }

    public function setTable($tableName)
    {
        $this->table = $tableName;
        $this->prepareSql();
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
        $this->prepareSql();
    }

    private function prepareSql()
    {
        $fields = $this->columnsArrayToString($this->fields);
        $table = $this->table;

        if ($this->fromSelect) {
            $from = "($this->fromSelect)";
        } else {
            $from = "statistics.{$table}";
        }

        $this->sql = "SELECT {$fields} FROM {$from}";

    }

    /**
     * @param array $columnsArray
     * @return string
     */
    protected function columnsArrayToString(array $columnsArray) : string
    {
        $result = [];
        foreach ($columnsArray as $key => $value) {
            if (is_numeric($key)) {
                $result[] = $value;
                continue;
            }
            list($value, $key) = preg_replace('/\s+/', ' ', [$value, $key]);
            $result[] = $key === $value ? $value : "$value as $key";
        }

        return implode(',', $result);
    }
}