<?php
namespace CHBuilder\Functions;

/**
 * Class Max
 * @package CHBuilder\Functions
 */
class Max extends AggregateFunction
{
    /**
     * @return string
     */
    public function getSQL(): string
    {
        return "max({$this->column})";
    }
}
