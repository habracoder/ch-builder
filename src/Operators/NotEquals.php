<?php

namespace CHBuilder\Operators;

/**
 * Class NotEquals
 * @package CHBuilder\Operators
 */
class NotEquals extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} != {$this->b}";
    }
}
