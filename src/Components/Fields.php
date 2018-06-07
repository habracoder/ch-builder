<?php
/**
 * Created by PhpStorm.
 * User: habracoder
 * Date: 6/7/18
 * Time: 7:26 PM
 */

namespace CHBuilder\Components;


use CHBuilder\ComponentInterface;

class Fields implements \Iterator, ComponentInterface
{
    /**
     * @var Field[]
     */
    private $fields;

    /**
     * @return Field
     */
    public function current(): Field
    {
        return current($this->fields);
    }

    /**
     * @return int|mixed|null|string
     */
    public function key()
    {
        return key($this->fields);
    }

    /**
     * @return Field
     */
    public function next(): Field
    {
        return next($this->fields);
    }

    public function rewind(): Field
    {
        return reset($this->fields);
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->fields[$this->key()]);
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param Field $field
     * @return Fields
     */
    public function addField(Field $field): self
    {
        $this->fields[] = $field;
        return $this;
    }

    public function getSQL(): string
    {
        $sql = [];

        foreach ($this->fields as $field) {
            $sql[] = $field->getSQL();
        }

        return implode(',', $sql);
    }
}