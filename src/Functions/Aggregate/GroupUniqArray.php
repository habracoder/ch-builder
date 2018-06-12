<?php
/**
 * Creates an array from different argument values.
 * Memory consumption is the same as for the ‘uniqExact’ function.
 */
namespace CHBuilder\Functions\Aggregate;

/**
 * Class GroupUniqArray
 * @package CHBuilder\Functions\Aggregate
 */
class GroupUniqArray extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "groupUniqArray({$this->column})";
    }
}
