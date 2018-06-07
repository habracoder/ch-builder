<?php

namespace CHBuilder\Components;

use CHBuilder\ComponentInterface;

/**
 * Class Select
 * @package CHBuilder\Components
 */
class Select implements ComponentInterface
{
    /**
     * @var Fields
     */
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

        foreach ($fields as $field) {
            if (is_array($field)) {
                return $this->convertRawData($field);
            }


            if ($field instanceof Field) {
                $result->addField($field);
                continue;
            }

            $result->addField(
                new Field($field)
            );
        }

        return $result;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->fields;
    }
}
