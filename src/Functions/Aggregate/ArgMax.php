<?php
/**
 * Calculates the ‘arg’ value for a maximum ‘val’ value.
 * If there are several different values of ‘arg’ for maximum values of ‘val’,
 * the first of these values encountered is output.
 */
namespace CHBuilder\Functions\Aggregate;

/**
 * Class ArgMax
 * @package CHBuilder\Functions\Aggregate
 */
class ArgMax extends AggregateFunction
{
    private $value;

    public function __construct(string $arg, $val)
    {
        parent::__construct($arg);
        $this->value = $val;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "argMax({$this->column}, {$this->value})";
    }
}
