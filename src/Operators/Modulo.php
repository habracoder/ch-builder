<?php

namespace CHBuilder\Operators;

/**
 * Class Modulo
 * @package CHBuilder\Operators
 */
class Modulo extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} % {$this->b}";
    }
}