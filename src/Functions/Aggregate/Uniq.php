<?php
/**
 * Calculates the approximate number of different values of the argument.
 * Works for numbers, strings, dates, and dates with times.
 *
 * Uses an adaptive sampling algorithm: for the calculation state,
 * it uses a sample of element hash values with a size up to 65535.
 * Compared with the widely known HyperLogLog algorithm, this algorithm is less effective in terms of accuracy
 * and memory consumption (even up to proportionality), but it is adaptive. This means that with fairly high accuracy,
 * it consumes less memory during simultaneous computation of cardinality for a large number of data sets whose
 * cardinality has power law distribution (i.e. in cases when most of the data sets are small).
 * This algorithm is also very accurate for data sets with small cardinality (up to 65536)
 * and very efficient on CPU (when computing not too many of these functions, using ‘uniq’
 * is almost as fast as using other aggregate functions).
 *
 * There is no compensation for the bias of an estimate, so for large data sets the results are systematically deflated.
 * This function is normally used for computing the number of unique visitors in Yandex.Metrica,
 * so this bias does not play a role.
 *
 * The result is determinate (it doesn’t depend on the order of query execution).
 */
namespace CHBuilder\Functions\Aggregate;

/**
 * Class Uniq
 * @package CHBuilder\Functions\Aggregate
 */
class Uniq extends AggregateFunction
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return "uniq({$this->column})";
    }
}
