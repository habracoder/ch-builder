<?php
/**
 * Created by PhpStorm.
 * User: habracoder
 * Date: 6/7/18
 * Time: 10:35 PM
 */

namespace CHBuilder;


use CHBuilder\Functions\Any;
use CHBuilder\Functions\AsExpr;
use CHBuilder\Functions\Count;
use CHBuilder\Functions\Length;
use CHBuilder\Functions\Sum;
use CHBuilder\Functions\SumIf;
use CHBuilder\Functions\ToInt64;
use CHBuilder\Functions\Value;

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
     * @return Sum
     */
    public function sum(string $column): Sum
    {
        return new Sum($column);
    }

    /**
     * @param string $column
     * @param string $condition
     * @return SumIf
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
     * @return Value
     */
    public function value(string $value): Value
    {
        return new Value($value);
    }

    /**
     * @param Builder ...$builders
     * @return string
     */
    public function unionAll(Builder ... $builders)
    {
        $queries = [];

        foreach ($builders as $builder) {
            $queries[] = $builder->toSQL();
        }

        return implode(" UNION ALL ", $queries);
    }

    /**
     * @param FunctionInterface $expression
     * @param $name
     * @return AsExpr
     */
    public function as(FunctionInterface $expression, string $name)
    {
        return new AsExpr($expression, $name);
    }

    /**
     * @param string $column
     * @return Any
     */
    public function any(string $column): Any
    {
        return new Any($column);
    }
}