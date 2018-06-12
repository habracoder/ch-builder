<?php

namespace CHBuilder\Functions\Aggregate;

/**
 * Class Max
 * @package CHBuilder\Functions
 */
class Max extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "max({$this->column})";
    }
}
