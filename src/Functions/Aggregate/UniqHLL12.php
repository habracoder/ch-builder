<?php
/**
 * Uses the HyperLogLog algorithm to approximate the number of different values of the argument.
 * It uses 212 5-bit cells. The size of the state is slightly more than 2.5 KB.
 *
 * The result is determinate (it doesn’t depend on the order of query execution).
 *
 * In most cases, use the ‘uniq’ function. You should only use this function if you understand its advantages well.
 */
namespace CHBuilder\Functions\Aggregate;

/**
 * Class UniqHLL12
 * @package CHBuilder\Functions\Aggregate
 */
class UniqHLL12 extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "uniqHLL12({$this->column})";
    }
}
