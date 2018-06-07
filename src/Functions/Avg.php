<?php
namespace CHBuilder\Functions;

/**
 * Class Avg
 * @package CHBuilder\Functions
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
