<?php
namespace CHBuilder\Functions;

/**
 * Class Min
 * @package CHBuilder\Functions
 */
class Min extends AggregateFunction
{
    /**
     * @return string
     */
    public function getSQL(): string
    {
        return "min({$this->column})";
    }
}
