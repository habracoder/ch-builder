<?php
namespace CHBuilder\Functions;

use CHBuilder\StringAble;

/**
 * Class AndX
 * @package CHBuilder\Functions
 */
class AndX implements StringAble
{
    /**
     * @var array
     */
    private $conditions = [];

    /**
     * AndX constructor.
     * @param array $conditions
     */
    public function __construct(array $conditions)
    {
        $this->conditions = $conditions;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $conditions = implode(' AND ', $this->conditions);

        return "({$conditions})";
    }
}
