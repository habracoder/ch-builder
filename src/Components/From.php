<?php

namespace CHBuilder\Components;

use CHBuilder\ComponentInterface;

class From implements ComponentInterface
{
    public function __construct($table)
    {
    }

    public function __toString(): string
    {
        return 'FROM';
    }
}
