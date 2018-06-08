<?php

namespace CHBuilder\Operators;

/**
 * Class LessOrEquals
 * @package CHBuilder\Operators
 */
class LessOrEquals extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} <= {$this->b}";
    }
}
