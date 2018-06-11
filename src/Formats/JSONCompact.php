<?php
/**
 * Differs from JSON only in that data rows are output in arrays, not in objects.
 * @link http://clickhouse-docs.readthedocs.io/en/latest/formats/jsoncompact.html
 */
declare(strict_types=1);
namespace CHBuilder\Formats;

/**
 * Class JSONCompact
 * @package CHBuilder\Formats
 */
class JSONCompact implements FormatInterface
{
    /**
     * SQL format declaration
     */
    const NAME = 'JSONCompact';

    /**
     * @return string
     */
    static public function getName(): string
    {
        return self::getName();
    }
}
