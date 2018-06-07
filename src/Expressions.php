<?php
/**
 * Created by PhpStorm.
 * User: habracoder
 * Date: 6/7/18
 * Time: 10:35 PM
 */

namespace CHBuilder;


use CHBuilder\Functions\Any;
use CHBuilder\Functions\Sum;
use CHBuilder\Functions\SumIf;

class Expressions
{

    /**
     * @param string $field
     * @return Sum
     */
    public function sum(string $field)
    {
        return new Sum($field);
    }

    public function sumIf(string $field): SumIf
    {
        return new SumIf($field);
    }

    /**
     * @param $value
     * @return Any
     */
    public function any(string $value)
    {
        return new Any($value);
    }
}