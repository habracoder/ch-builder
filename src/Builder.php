<?php
declare(strict_types=1);
namespace CHBuilder;
use CHBuilder\Builders\CreateBuilder;

/**
 * Class Builder
 * @package CHBuilder
 */
class Builder
{
    /**
     * @param $data
     * @return InsertBuilder
     */
    public function insert($data): InsertBuilder
    {
        return new InsertBuilder($data);
    }

    /**
     * @param mixed ...$params
     * @return $this
     * @throws \Exception
     */
    public function select(... $params)
    {
        return new SelectBuilder($params);
    }

    /**
     * @return CreateBuilder
     */
    public function create(): CreateBuilder
    {
        return new CreateBuilder();
    }

    /**
     * @return Builder
     */
    public function createBuilder(): self
    {
        return new self;
    }

    /**
     * @return Expression
     */
    public function expr()
    {
        return Expression::getInstance();
    }
}
