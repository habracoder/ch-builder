<?php

namespace CHBuilder;

use CHBuilder\Components\Select;
use CHBuilder\Functions\Any;
use CHBuilder\Functions\Sum;
use ClickHouseDB\Client;

class Builder
{
    private $client;
    private $query;

    public function __construct(Client $client)
    {
        $this->query = new Query($client);
    }

    public function createBuilder()
    {
        return new self($this->client);
    }

    /**
     * @param
     * @return $this
     */
    public function select(... $params)
    {
        $select = new Select($params);


        return $this;
    }

    public function as(FunctionInterface $expression, $name)
    {
        return $expression->getSQL() . ' AS ' . "`{$name}`";
    }

    public function from($table)
    {
        if ($table instanceof Query) {
            $this->query->setFromSelect();
        }

        $this->query->setTable($table);
        return $this;
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