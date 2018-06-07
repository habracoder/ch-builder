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
    public function __toString(): string
    {
        return "max({$this->column})";
    }
}
