<?php

namespace CHBuilder\Components;

use CHBuilder\ComponentInterface;

class Select implements ComponentInterface
{
    private $fields;

    /**
     * Select constructor.
     * @param array $fields
     * @throws \Exception
     */
    public function __construct(array $fields)
    {
        $this->fields = $this->convertRawData($fields);
    }

    /**
     * @param array $fields
     * @return Fields
     * @throws \Exception
     */
    public function convertRawData(array $fields): Fields
    {
        $result = new Fields;

        foreach ($fields as $index => $field) {
            if (is_array($field)) {
                return $this->convertRawData($field);
            }


            if ($field instanceof Field) {
                $result->addField($field);
                continue;
            }

            if (is_string($index)) {
                $result->addField(new Field($index, $field));
                continue;
            }

            $result->addField(
                new Field($field)
            );
        }

        return $result;
    }

    public function getSQL(): string
    {
        // TODO: Implement getSQL() method.
        return '';
    }
}
