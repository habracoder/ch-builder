<?php
/**
 * Approximately computes the number of different values ​​of the argument.
 * Works for numbers, strings, dates, date-with-time, for several arguments and arguments-tuples.
 *
 * A combination of three algorithms is used: an array, a hash table and HyperLogLog with an error correction table.
 * The memory consumption is several times smaller than the uniq function, and the accuracy is several times higher.
 * The speed of operation is slightly lower than that of the uniq function,
 * but sometimes it can be even higher - in the case of distributed requests, in which a large number of aggregation
 * states are transmitted over the network. The maximum state size is 96 KiB (HyperLogLog of 217 6-bit cells).
 *
 * The result is deterministic (it does not depend on the order of query execution).
 *
 * The uniqCombined function is a good default choice for calculating the number of different values.
 */
namespace CHBuilder\Functions\Aggregate;

/**
 * Class UniqCombined
 * @package CHBuilder\Functions\Aggregate
 */
class UniqCombined extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "uniqCombined({$this->column})";
    }
}
