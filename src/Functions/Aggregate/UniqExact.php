<?php
/**
 * Calculates the number of different values of the argument, exactly.
 * There is no reason to fear approximations, so it’s better to use the ‘uniq’ function.
 * You should use the ‘uniqExact’ function if you definitely need an exact result.
 *
 * The ‘uniqExact’ function uses more memory than the ‘uniq’ function,
 * because the size of the state has unbounded growth as the number of different values increases.
 */
namespace CHBuilder\Functions\Aggregate;

/**
 * Class UniqExact
 * @package CHBuilder\Functions\Aggregate
 */
class UniqExact extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "uniqExact({$this->column})";
    }
}
