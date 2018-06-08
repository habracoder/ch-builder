<?php

namespace CHBuilder;

use CHBuilder\Components\From;
use CHBuilder\Components\FromQuery;
use CHBuilder\Components\FromTable;
use CHBuilder\Components\Select;
use CHBuilder\Components\Where;
use CHBuilder\Conditions\ConditionInterface;
use ClickHouseDB\Client;

/**
 * Class Builder
 * @package CHBuilder
 */
class Builder implements StringAble
{
    /**
     * @var Select[]
     */
    private $select = [];

    /**
     * @var From[]
     */
    private $from = [];

    /**
     * @var Where[]
     */
    private $where = [];

    private $union = false;
    private $client;
    private $query;
    private $hash;
    private $hashes = [];

    public function __construct(Client $client)
    {
        $this->query = new Query($client);
        $this->hash = uniqid();
        $this->hashes[] = $this->hash;
    }

    /**
     * @return Builder
     */
    public function createBuilder(): self
    {
        return new self($this->client);
    }

    /**
     * @param mixed ...$params
     * @return $this
     * @throws \Exception
     */
    public function select(... $params)
    {
        $this->select[$this->hash] = new Select($params);

        return $this;
    }

    /**
     * @return Expression
     */
    public function expr()
    {
        return Expression::getInstance();
    }

    /**
     * @param Builder|string $tableOrBuilder
     * @return $this
     * @throws \Exception
     */
    public function from($tableOrBuilder)
    {
        if ($tableOrBuilder instanceof Builder) {
            $this->from[$this->hash] = new FromQuery($tableOrBuilder);
            return $this;
        }

        if (is_string($tableOrBuilder)) {
            $this->from[$this->hash] = new FromTable($tableOrBuilder);
            return $this;
        }

        throw new \Exception('Wrong table');
    }

    /**
     * @return Builder
     */
    public function unionAll(): self
    {
        $this->union = true;
        $this->hash = uniqid();
        $this->hashes[] = $this->hash;
        return $this;
    }

    /**
     * @param ConditionInterface|string $expr
     * @return $this
     */
    public function where($expr)
    {
        $this->where[$this->hash] = new Where($expr);
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if (!$this->union) {
            $sql = $this->select[$this->hash] . ' ' . $this->from[$this->hash];
        } else {
            $queries = [];
            foreach ($this->hashes as $hash) {
                $select = $this->select[$hash];
                $table = $this->from[$hash];

                $queries[] = "{$select} {$table}";
            }
            $sql = implode(' UNION ALL ', $queries);
        }

        return $sql;
    }
}
