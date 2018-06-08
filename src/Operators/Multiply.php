<?php

namespace CHBuilder\Operators;

/**
 * Class Multiply
 * @package CHBuilder\Operators
 */
class Multiply extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} * {$this->b}";
    }
}