<?php

namespace CHBuilder\Functions;

/**
 * Class Count
 * @package CHBuilder\Functions
 */
class Count extends AggregateFunction
{
    /**
     * @return string
     */
    public function getSQL(): string
    {
        return "count({$this->column})";
    }
}
