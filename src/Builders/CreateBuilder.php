<?php

namespace CHBuilder\Builders;

use CHBuilder\Builders\Create\DatabaseBuilder;
use CHBuilder\Builders\Create\TableBuilder;
use CHBuilder\Builders\Create\ViewBuilder;
use CHBuilder\StringAble;

/**
 * Class CreateBuilder
 * @package CHBuilder\Builders
 */
class CreateBuilder implements StringAble
{

    public function database(string $database)
    {
        return new DatabaseBuilder($database);
    }

    public function table(string $table)
    {
        return new TableBuilder($table)
    }

    public function view(string $view)
    {
        return new ViewBuilder($view);
    }

    public function __toString(): string
    {

    }
}