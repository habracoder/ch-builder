<?php
/**
 * Creates an array of argument values.
 * Values can be added to the array in any (indeterminate) order.
 *
 * In some cases, you can rely on the order of execution.
 * This applies to cases when SELECT comes from a subquery that uses ORDER BY.
 */
namespace CHBuilder\Functions\Aggregate;

/**
 * Class GroupArray
 * @package CHBuilder\Functions\Aggregate
 */
class GroupArray extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "groupArray({$this->column})";
    }
}
