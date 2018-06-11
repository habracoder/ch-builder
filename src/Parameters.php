<?php

namespace CHBuilder;

/**
 * Class Parameters
 * @package CHBuilder
 */
class Parameters implements \Iterator
{
    /**
     * @var Parameter[]
     */
    private $parameters = [];

    /**
     * @param Parameter $parameter
     * @return Parameters
     */
    public function addParameter(Parameter $parameter): self
    {
        $this->parameters[] = $parameter;
        return $this;
    }

    /**
     * @return int
     */
    public function key(): ?int
    {
        return key($this->parameters);
    }

    /**
     * @return Parameter
     */
    public function current(): Parameter
    {
        return current($this->parameters);
    }

    /**
     * @return Parameter|false
     */
    public function next()
    {
        return next($this->parameters);
    }

    /**
     * @return Parameter
     */
    public function rewind(): Parameter
    {
        return reset($this->parameters);
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->parameters[$this->key()]);
    }
}
