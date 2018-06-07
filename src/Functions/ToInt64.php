<?php
namespace CHBuilder\Functions;
use CHBuilder\FunctionInterface;

/**
 * Class Length
 * @package CHBuilder\Functions
 */
class ToInt64 implements FunctionInterface
{
    private $column;

    /**
     * ToInt64 constructor.
     * @param string $column
     */
    public function __construct(string $column)
    {
        $this->column = $column;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "toInt64({$this->column})";
    }
}
