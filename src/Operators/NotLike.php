<?php

namespace CHBuilder\Operators;

/**
 * Class NotLike
 * @package CHBuilder\Operators
 */
class NotLike extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} NOT LIKE '{$this->b}'";
    }
}
