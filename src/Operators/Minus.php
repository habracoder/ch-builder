<?php

namespace CHBuilder\Operators;

/**
 * Class Plus
 * @package CHBuilder\Operators
 */
class Minus extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} - {$this->b}";
    }
}