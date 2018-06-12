<?php
/**
 * Calculates the ‘arg’ value for a minimal ‘val’ value.
 * If there are several different values of ‘arg’ for minimal values of ‘val’,
 * the first of these values encountered is output.
 */
namespace CHBuilder\Functions\Aggregate;

/**
 * Class ArgMin
 * @package CHBuilder\Functions\Aggregate
 */
class ArgMin extends AggregateFunction
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
        return "argMin({$this->column}, {$this->value})";
    }
}
