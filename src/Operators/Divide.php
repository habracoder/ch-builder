<?php

namespace CHBuilder\Operators;

/**
 * Class Divide
 * @package CHBuilder\Operators
 */
class Divide extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} / {$this->b}";
    }
}