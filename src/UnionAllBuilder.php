<?php
/**
 * Created by PhpStorm.
 * User: habracoder
 * Date: 6/8/18
 * Time: 12:04 AM
 */

namespace CHBuilder;

/**
 * Class UnionAllBuilder
 * @package CHBuilder
 */
class UnionAllBuilder extends Builder implements \Iterator, StringAble
{
    /**
     * @var Builder[]
     */
    private $builders = [];

    /**
     * @return string
     */
    public function __toString(): string
    {
        $sql = [];

        foreach ($this->builders as $builder) {
            $sql[] = (string) $builder;
        }

        return implode(" UNION ALL ", $sql);
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->builders[$this->key()]);
    }

    /**
     * @return Builder
     */
    public function rewind(): Builder
    {
        return reset($this->builders);
    }

    /**
     * @return Builder
     */
    public function next(): Builder
    {
        return next($this->builders);
    }

    /**
     * @return Builder
     */
    public function current(): Builder
    {
        return current($this->builders);
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return key($this->builders);
    }
}