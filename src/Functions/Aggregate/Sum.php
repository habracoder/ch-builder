<?php
/**
 * Calculates the sum. Only works for numbers.
 */
namespace CHBuilder\Functions\Aggregate;

/**
 * Class Sum
 * @package CHBuilder\Functions\Aggregate
 */
class Sum extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "sum({$this->column})";
    }
}
