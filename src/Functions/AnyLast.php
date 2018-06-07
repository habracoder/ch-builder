<?php
namespace CHBuilder\Functions;

/**
 * Class AnyLast
 * @package CHBuilder\Functions
 */
class AnyLast extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "anyLast({$this->column})";
    }
}
