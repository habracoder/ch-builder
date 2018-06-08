<?php

namespace CHBuilder\Operators;

/**
 * Class Greater
 * @package CHBuilder\Operators
 */
class Like extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} LIKE '{$this->b}'";
    }
}
