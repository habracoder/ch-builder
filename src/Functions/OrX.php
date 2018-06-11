<?php
namespace CHBuilder\Functions;

use CHBuilder\StringAble;

/**
 * Class OrX
 * @package CHBuilder\Functions
 */
class OrX implements StringAble
{
    /**
     * @var array
     */
    private $conditions = [];

    /**
     * OrX constructor.
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
        $conditions = implode(" OR ", $this->conditions);

        return "({$conditions})";
    }
}
