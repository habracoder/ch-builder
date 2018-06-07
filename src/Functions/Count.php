<?php
namespace CHBuilder\Functions;

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
    public function getSQL(): string
    {
        return "count()";
    }
}
