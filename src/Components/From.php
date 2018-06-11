<?php

namespace CHBuilder\Components;

use CHBuilder\ComponentInterface;

/**
 * Class From
 * @package CHBuilder\Components
 */
class From implements ComponentInterface
{
    protected $database;

    public function __construct($table)
    {
    }

    public function __toString(): string
    {
        return 'FROM';
    }

    /**
     * @param string $database
     * @return From
     */
    public function setDatabase(string $database): self
    {
        $this->database = $database;
        return $this;
    }
}
