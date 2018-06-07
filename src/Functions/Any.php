<?php

namespace CHBuilder\Functions;

use CHBuilder\FunctionInterface;

/**
 * Class Any
 * @package CHBuilder\Functions
 */
class Any implements FunctionInterface
{
    private $input;

    /**
     * Any constructor.
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
        return "any({$this->input})";
    }
}