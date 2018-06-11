<?php
/**
 * Formats
 * The format determines how data is given (written by server as output) to you after SELECTs,
 * and how it is accepted (read by server as input) for INSERTs.
 */
declare(strict_types=1);
namespace CHBuilder\Formats;

/**
 * Interface FormatInterface
 * @package CHBuilder\Formats
 */
interface FormatInterface
{
    static function getName(): string;
}
