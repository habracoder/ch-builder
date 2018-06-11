<?php

namespace CHBuilder\Components;
use CHBuilder\Builder;

/**
 * Class FromQuery
 * @package CHBuilder\Components
 */
class FromQuery extends From
{
    /**
     * @var Builder
     */
    private $queryBuilder;

    /**
     * FromQuery constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->queryBuilder = $builder;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if ($this->database) {
            $this->queryBuilder->database($this->database);
        }

        return "FROM ({$this->queryBuilder})";
    }
}
