<?php
/**
 * Outputs data in JSON format. Besides data tables, it also outputs column names and types,
 * along with some additional information - the total number of output rows,
 * and the number of rows that could have been output if there weren’t a LIMIT.
 * @link http://clickhouse-docs.readthedocs.io/en/latest/formats/json.html
 */
declare(strict_types=1);
namespace CHBuilder\Formats;

/**
 * Class JSON
 * @package CHBuilder\Formats
 */
class JSON implements FormatInterface
{
    /**
     * SQL format declaration
     */
    const NAME = 'CSVWithNames';

    /**
     * @return string
     */
    static public function getName(): string
    {
        return self::getName();
    }
}
