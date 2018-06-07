<?php
namespace CHBuilder\Functions;

/**
 * Class Sum
 * @package CHBuilder\Functions
 */
class Sum extends AggregateFunction
{
    /**
     * @return string
     */
    public function getSQL(): string
    {
        return "sum({$this->column})";
    }
}
