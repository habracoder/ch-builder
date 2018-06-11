<?php

namespace CHBuilder\Operators;

/**
 * Class In
 * @package CHBuilder\Operators
 */
class In extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} IN ({$this->b})";
    }
}
