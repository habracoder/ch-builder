<?php

namespace CHBuilder\Operators;

/**
 * Class Plus
 * @package CHBuilder\Operators
 */
class Plus extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} + {$this->b}";
    }
}