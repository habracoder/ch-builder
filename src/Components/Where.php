<?php
namespace CHBuilder\Components;

use CHBuilder\ComponentInterface;
use CHBuilder\Conditions\ConditionInterface;

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
        $conditions = implode(' AND ', $this->expression);

        return "WHERE {$conditions}";
    }
}
