<?php
/**
 * In TabSeparated format, data is written by row. Each row contains values separated by tabs.
 * Each value is follow by a tab, except the last value in the row, which is followed by a line break.
 * Strictly Unix line breaks are assumed everywhere. The last row also must contain a line break at the end.
 * Values are written in text format, without enclosing quotation marks, and with special characters escaped.
 * @link http://clickhouse-docs.readthedocs.io/en/latest/formats/tabseparated.html
 */
declare(strict_types=1);
namespace CHBuilder\Formats;

/**
 * Class TabSeparated
 * @package CHBuilder\Formats
 */
class TabSeparated implements FormatInterface
{
    /**
     * SQL format declaration
     */
    const NAME = 'TabSeparated';

    /**
     * @return string
     */
    static public function getName(): string
    {
        return self::getName();
    }
}
