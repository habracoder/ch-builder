<?php
namespace CHBuilder\Functions;

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