<?php

namespace CHBuilder\Operators;

/**
 * Class Equals
 * @package CHBuilder\Operators
 */
class Equals extends AbstractOperator
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} = {$this->b}";
    }
}
