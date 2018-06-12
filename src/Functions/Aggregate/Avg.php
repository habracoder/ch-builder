<?php
/**
 * Calculates the average. Only works for numbers. The result is always Float64.
 */
namespace CHBuilder\Functions\Aggregate;

/**
 * Class Avg
 * @package CHBuilder\Functions\Aggregate
 */
class Avg extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "avg({$this->column})";
    }
}
