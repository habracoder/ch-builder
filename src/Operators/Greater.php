<?php

namespace CHBuilder\Operators;

/**
 * Class Greater
 * @package CHBuilder\Operators
 */
class Greater extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} > {$this->b}";
    }
}
