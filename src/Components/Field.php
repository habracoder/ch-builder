<?php

namespace CHBuilder\Components;

use CHBuilder\ComponentInterface;
use Exception;

/**
 * Class Field
 * @package CHBuilder\Components
 */
class Field implements ComponentInterface
{
    private $name;
    private $expression;

    /**
     * Field constructor.
     * @param string $name
     * @param null|string $expression
     * @throws Exception
     */
    public function __construct(string $name, ?string $expression = null)
    {
        $this->name = $name;
        $this->expression = $expression;
        $this->validate();
    }

    /**
     * @throws Exception
     */
    private function validate(): void
    {
        if (!$this->name) {
            throw new Exception('Wrong name');
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if ($this->expression) {
            return $this->expression . ' AS ' . $this->name;
        }

        return $this->name;
    }
}