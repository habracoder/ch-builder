<?php
namespace CHBuilder\Functions;

/**
 * Class Length
 * @package CHBuilder\Functions
 */
class Length extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "length({$this->column})";
    }
}
