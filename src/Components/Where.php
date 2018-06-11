<?php
namespace CHBuilder\Components;

use CHBuilder\ComponentInterface;
use CHBuilder\Conditions\ConditionInterface;
use CHBuilder\Operators\AbstractOperator;

/**
 * Class Where
 * @package CHBuilder\Components
 */
class Where implements ComponentInterface
{
    private $expression = [];

    /**
     * Where constructor.
     * @param ConditionInterface|string $expression
     */
    public function __construct($expression)
    {
        $this->expression = $expression;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if ($this->expression instanceof AbstractOperator) {
            return "WHERE {$this->expression}";
        }

        if (is_iterable($this->expression)) {
            return "WHERE " . implode(' AND ', $this->expression);
        }

        return "WHERE {$this->expression}";
    }
}
