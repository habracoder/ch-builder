<?php

namespace CHBuilder\Operators;

/**
 * Class Less
 * @package CHBuilder\Operators
 */
class Less extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} < {$this->b}";
    }
}
