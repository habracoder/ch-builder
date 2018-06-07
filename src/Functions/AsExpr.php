<?php
namespace CHBuilder\Functions;

use CHBuilder\FunctionInterface;

/**
 * Class AsExpr
 * @package CHBuilder\Functions
 */
class AsExpr implements FunctionInterface
{
    private $input;
    private $name;

    /**
     * AsExpr constructor.
     * @param string $input
     * @param string $name
     */
    public function __construct(string $input, string $name)
    {
        $this->input = $input;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSQL(): string
    {
        return $this->input . ' AS ' . "`{$this->name}`";
    }
}
