<?php

namespace CHBuilder\Operators;

use CHBuilder\StringAble;

abstract class AbstractOperator implements StringAble
{
    protected $a;
    protected $b;

    /**
     * Operators constructor.
     * @param $a
     * @param $b
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
}