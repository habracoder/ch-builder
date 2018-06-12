<?php
namespace CHBuilder\Functions\Aggregate;

/**
 * Class Count
 * @package CHBuilder\Functions
 */
class Count extends AggregateFunction
{
    /**
     * Count constructor.
     */
    public function __construct()
    {
        parent::__construct('');
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "count()";
    }
}
