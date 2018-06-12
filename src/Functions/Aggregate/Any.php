<?php

namespace CHBuilder\Functions\Aggregate;

/**
 * Class Any
 * @package CHBuilder\Functions
 */
class Any extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "any({$this->column})";
    }
}