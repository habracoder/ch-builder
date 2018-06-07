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
    public function getSQL(): string
    {
        return "any({$this->column})";
    }

    public function __toString()
    {
        return $this->getSQL();
    }
}