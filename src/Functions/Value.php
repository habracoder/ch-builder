<?php
namespace CHBuilder\Functions;

use CHBuilder\FunctionInterface;

/**
 * Class Value
 * @package CHBuilder\Functions
 */
class Value implements FunctionInterface
{
    /**
     * @var string
     */
    private $value;

    /**
     * Value constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getSQL(): string
    {
        return $this->value;
    }
}
