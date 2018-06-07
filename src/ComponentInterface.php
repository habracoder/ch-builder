<?php

namespace CHBuilder;

interface ComponentInterface
{
    /**
     * @return string
     */
    public function getSQL(): string;
}