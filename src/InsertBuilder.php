<?php
declare(strict_types = 1);
namespace CHBuilder;

use CHBuilder\Formats\FormatInterface;

/**
 * Class InsertBuilder
 * @package CHBuilder
 */
class InsertBuilder extends Builder implements StringAble
{
    /**
     * @var FormatInterface
     */
    private $format;

    /**
     * @var string
     */
    private $table;

    /**
     * @var string
     */
    private $database;

    /**
     * @var array
     */
    private $data;

    /**
     * InsertBuilder constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param string $table
     * @return InsertBuilder
     */
    public function into(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param string $database
     * @return InsertBuilder
     */
    public function database(string $database): self
    {
        $this->database = $database;
        return $this;
    }

    /**
     * @param $format
     * @return InsertBuilder
     * @throws \Exception
     */
    public function format($format): self
    {
        if ($format instanceof FormatInterface) {
            $this->format = $format;
            return $this;
        }

        if (is_string($format)) {

            // todo check interface
            if (class_exists($format)) {
                $this->format = new $format;
                return $this;
            }

            $className = "\CHBuilder\Formats\\" . $format;
            if (class_exists($className)) {
                $this->format = new $className;
                return $this;
            }
        }

        throw new \Exception("Unsupported format {$format}");
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $into = $this->database ? "{$this->database}.{$this->table}" : $this->table;

        $format = $this->format ? " FORMAT " . $this->format::getName() : '';

        return "INSERT INTO {$into} {$format}";
    }
}