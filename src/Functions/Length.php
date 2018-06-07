<?php

namespace CHBuilder\Functions;

use CHBuilder\FunctionInterface;

/**
 * Class Length
 * @package CHBuilder\Functions
 */
class Length implements FunctionInterface
{
    /**
     * @var string
     */
    private $input;

    /**
     * Sum constructor.
     * @param string $input
     */
    public function __construct(string $input)
    {
        $this->input = $input;
    }

    /**
     * @return string
     */
    public function getSQL(): string
    {
        return "length({$this->input})";
    }
}
