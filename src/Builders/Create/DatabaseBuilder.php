<?php

namespace CHBuilder\Builders\Create;

use CHBuilder\StringAble;

/**
 * Class DatabaseBuilder
 * @package CHBuilder\Builders\Create
 */
class DatabaseBuilder implements StringAble
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var
     */
    private $ifNotExists;

    /**
     * DatabaseBuilder constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param bool $ifNotExists
     * @return DatabaseBuilder
     */
    public function setIfNotExists(bool $ifNotExists = true): self
    {
        $this->ifNotExists = $ifNotExists;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $flag = $this->ifNotExists ? " IF NOT EXISTS" : '';

        return "CREATE DATABASE{$flag} {$this->name}";
    }
}
