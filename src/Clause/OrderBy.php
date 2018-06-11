<?php
namespace CHBuilder\Clause;

/**
 * Class Limit
 * @package CHBuilder\Clause
 */
class OrderBy
{
    private $orders = [];

    private const DIRECTION_ASC = "ASC";
    private const DIRECTION_DESC = "DESC";

    private const DIRECTIONS = [
        self::DIRECTION_ASC,
        self::DIRECTION_DESC,
    ];

    /**
     * OrderBy constructor.
     * @param $params
     * @throws \Exception
     */
    public function __construct($params)
    {
        $this->parseInput($params);
    }

    /**
     * @param $params
     * @throws \Exception
     */
    private function parseInput($params): void
    {
        $params = $this->convertToArray($params);
        $params = $this->convertArrayDeclaration($params);

        foreach ($params as $key => $value) {
            $uValue = strtoupper($value);

            if (!is_numeric($key) && in_array($uValue, self::DIRECTIONS)) {
                $this->setOrder($key, $uValue);
                continue;
            }

            if (is_numeric($key)) {

                if (strpos($value, ',') !== false) {
                    $rows = array_map('trim', explode(',', $value));

                    foreach ($rows as $row) {
                        $this->splitBySpace($row);
                    }
                } else {
                    $this->splitBySpace($value);
                }
            }
        }
    }

    /**
     * @param $params
     * @return array|mixed
     * @throws \Exception
     */
    private function convertArrayDeclaration($params): array
    {
        $firstElement = reset($params);

        if (is_array($firstElement)) {
            if (count($params) > 1) {
                throw new \Exception('При массивном формате указания направления, только 1 параметр разрешен');
            }
            $params = $firstElement;
        }
        
        return $params;
    }

    /**
     * @param $params
     * @return array
     * @throws \Exception
     */
    private function convertToArray($params): array
    {
        if (!is_array($params) && is_string($params)) {
            return [$params];
        }

        if (is_array($params)) {
            return $params;
        }

        throw new \Exception('must be string or array');
    }

    private function splitBySpace(string $input)
    {
        if (strpos($input, ' ') !== false) {
            $keyVal = array_map('trim', explode(' ', $input));
            if (count($keyVal) != 2) {
                throw new \Exception('Должно быть указано поле пробел направление');
            }
            $this->setOrder($keyVal[0], strtoupper($keyVal[1]));
        } else {
            $this->setOrder($input);
        }
    }

    private function setOrder($input, string $direction = self::DIRECTION_ASC)
    {
        $this->orders[] = [
            'input' => $input,
            'direction' => $direction
        ];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $blocks = [];

        foreach ($this->orders as $order) {
            $direction = $order['direction'] != self::DIRECTION_ASC ? " {$order['direction']}" : "";
            $blocks[] = "{$order['input']}{$direction}";
        }

        $sql = implode(', ', $blocks);

        return "ORDER BY {$sql}";
    }

    /**
     * @param $params
     * @throws \Exception
     */
    public function addOrder($params)
    {
        $this->parseInput($params);
    }
}
