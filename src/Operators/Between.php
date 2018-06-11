<?php

namespace CHBuilder\Operators;

/**
 * Class Between
 * @package CHBuilder\Operators
 */
class Between extends AbstractOperator
{
    /**
     * @var mixed
     */
    private $c;

    /**
     * NotLike constructor.
     * @param $a
     * @param $b
     * @param $c
     */
    public function __construct($a, $b, $c)
    {
        parent::__construct($a, $b);
        $this->c = $c;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->a} BETWEEN {$this->b} AND {$this->c}";
    }
}
