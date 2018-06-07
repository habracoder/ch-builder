<?php

namespace CHBuilder;

use CHBuilder\Components\Select;
use CHBuilder\Components\SubQuery;
use ClickHouseDB\Client;

class Builder
{
    /**
     * @var Select
     */
    private $select;
    private $client;
    private $query;

    public function __construct(Client $client)
    {
        $this->query = new Query($client);
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
        $this->select = new Select($params);

        return $this;
    }

    /**
     * @return Expression
     */
    public function expr()
    {
        return Expression::getInstance();
    }

    public function toSQL(): string
    {
        return "SELECT" . $this->select->getSQL();
    }

    public function from($table)
    {
        if ($table instanceof Query) {
            $this->query->setFromSelect();
        }

        $this->query->setTable($table);
        return $this;
    }

    public function createSubQuery()
    {
        $qb = new self($this->client);

        new SubQuery();
    }

    public function where()
    {
        return $this;
    }

    public function getQuery()
    {
        return $this->query;
    }
}