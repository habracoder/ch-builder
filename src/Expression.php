<?php
declare(strict_types = 1);
namespace CHBuilder;

use CHBuilder\Functions\Aggregate\AndX;
use CHBuilder\Functions\Aggregate\Any;
use CHBuilder\Functions\AsExpr;
use CHBuilder\Functions\Aggregate\Count;
use CHBuilder\Functions\Length;
use CHBuilder\Functions\OrX;
use CHBuilder\Functions\Aggregate\Sum;
use CHBuilder\Functions\Aggregate\SumIf;
use CHBuilder\Functions\ToInt64;
use CHBuilder\Functions\Value;
use CHBuilder\Operators;

/**
 * Class Expression
 * @package CHBuilder
 */
class Expression
{
    /**
     * @var self
     */
    private static $instance;

    /**
     * @return Expression
     */
    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Muted
     */
    private function __clone() {}
    private function __construct() {}

    /**
     * @param string $column
     * @return \CHBuilder\Functions\Aggregate\Sum
     */
    public function sum(string $column): Sum
    {
        return new Sum($column);
    }

    /**
     * @param string $column
     * @param string $condition
     * @return \CHBuilder\Functions\Aggregate\SumIf
     */
    public function sumIf(string $column, string $condition): SumIf
    {
        return new SumIf($column, $condition);
    }

    /**
     * @param string $column
     * @return Length
     */
    public function length(string $column): Length
    {
        return new Length($column);
    }

    /**
     * @return Count
     */
    public function count(): Count
    {
        return new Count();
    }

    /**
     * @param string $value
     * @return ToInt64
     */
    public function toInt64(string $value): ToInt64
    {
        return new ToInt64($value);
    }

    /**
     * @param string $value
     * @return \CHBuilder\Functions\Aggregate\Value
     */
    public function value(string $value): Value
    {
        return new Value($value);
    }

    /**
     * @param FunctionInterface $expression
     * @param $name
     * @return AsExpr
     */
    public function as(FunctionInterface $expression, string $name)
    {
        return new AsExpr((string)$expression, $name);
    }

    /**
     * @param string $column
     * @return \CHBuilder\Functions\Aggregate\Any
     */
    public function any(string $column): Any
    {
        return new Any($column);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\Equals
     */
    public function eq($a, $b): Operators\Equals
    {
        return new Operators\Equals($a, $b);
    }

    /**
     * @param mixed ...$conditions
     * @return AndX
     */
    public function andX(... $conditions): AndX
    {
        return new AndX($conditions);
    }

    /**
     * @param mixed ...$conditions
     * @return OrX
     */
    public function orX(... $conditions): OrX
    {
        return new OrX($conditions);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\Less
     */
    public function lt($a, $b): Operators\Less
    {
        return new Operators\Less($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\Greater
     */
    public function gt($a, $b): Operators\Greater
    {
        return new Operators\Greater($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\LessOrEquals
     */
    public function lte($a, $b): Operators\LessOrEquals
    {
        return new Operators\LessOrEquals($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\GreaterOrEquals
     */
    public function gte($a, $b): Operators\GreaterOrEquals
    {
        return new Operators\GreaterOrEquals($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\Like
     */
    public function like($a, $b): Operators\Like
    {
        return new Operators\Like($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\NotLike
     */
    public function nLike($a, $b): Operators\NotLike
    {
        return new Operators\NotLike($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\Minus
     */
    public function minus($a, $b): Operators\Minus
    {
        return new Operators\Minus($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\Modulo
     */
    public function modulo($a, $b): Operators\Modulo
    {
        return new Operators\Modulo($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\Multiply
     */
    public function multiple($a, $b): Operators\Multiply
    {
        return new Operators\Multiply($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\Divide
     */
    public function divide($a, $b): Operators\Divide
    {
        return new Operators\Divide($a, $b);
    }

    /**
     * @param $a
     * @param $b
     * @return Operators\In
     */
    public function in($a, $b): Operators\In
    {
        return new Operators\In($a, $b);
    }
}