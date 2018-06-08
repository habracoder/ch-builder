<?php

namespace CHBuilder\Operators;

/**
 * Class GreaterOrEquals
 * @package CHBuilder\Operators
 */
class GreaterOrEquals extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} >= {$this->b}";
    }
}
