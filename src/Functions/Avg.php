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
    public function getSQL(): string
    {
        return "avg({$this->column})";
    }
}
