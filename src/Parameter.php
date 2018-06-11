<?php
/**
 * Created by PhpStorm.
 * User: habracoder
 * Date: 6/8/18
 * Time: 5:02 PM
 */

namespace CHBuilder;

/**
 * Class Parameter
 * @package CHBuilder
 */
class Parameter
{
    private $name;
    private $value;
    /**
     * Parameter constructor.
     * @param $name
     * @param $value
     */
    public function __construct(string $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @param string $query
     * @return string
     */
    public function inject(string $query): string
    {
        if (is_numeric($this->value)) {
            return str_replace(":{$this->name}", $this->value, $query);
        }

        if (is_array($this->value)) {
            return str_replace(":{$this->name}", implode(',', $this->value), $query);
        }

        return str_replace(":{$this->name}", $this->value, $query);
    }
}