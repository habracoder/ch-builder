<?php
namespace CHBuilder\Functions\Aggregate;

use CHBuilder\FunctionInterface;

/**
 * Class AggregateFunction
 * @package CHBuilder\Functions
 */
abstract class AggregateFunction implements FunctionInterface
{
    protected $column;

    /**
     * AggregateFunction constructor.
     * @param string $column
     */
    public function __construct(string $column)
    {
        $this->column = $column;
    }
}
