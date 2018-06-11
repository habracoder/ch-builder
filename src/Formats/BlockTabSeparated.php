<?php
/**
 * Data is not written by row, but by column and block.
 * Each block consists of parts of columns, each of which is written on a separate line.
 * The values are tab-separated. The last value in a column part is followed by a line break instead of a tab.
 * Blocks are separated by a double line break. The rest of the rules are the same as in the TabSeparated format.
 * This format is only appropriate for outputting a query result, not for parsing.
 */
declare(strict_types=1);
namespace CHBuilder\Formats;

/**
 * Class BlockTabSeparated
 * @package CHBuilder\Formats
 */
class BlockTabSeparated implements FormatInterface
{
    /**
     * SQL format declaration
     */
    const FORMAT = 'BlockTabSeparated';

    /**
     * @return string
     */
    public static function getName(): string
    {
        return self::FORMAT;
    }
}
