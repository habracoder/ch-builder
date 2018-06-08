<?php
namespace CHBuilder\Functions;

use CHBuilder\Conditions\ConditionInterface;

/**
 * Class AnyLast
 * @package CHBuilder\Functions
 */
class Equal implements ConditionInterface
{
    /**
     * @var string
     */
    private $column;


    private $value;

    public function __construct(string $column, $value)
    {
        $this->column = $column;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "`{$this->column}` = {$this->value}";
    }
}
