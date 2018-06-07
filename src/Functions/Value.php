<?php
namespace CHBuilder\Functions;

use CHBuilder\StringAble;

/**
 * Class Value
 * @package CHBuilder\Functions
 */
class Value implements StringAble
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
    public function __toString(): string
    {
        return $this->value;
    }
}
