<?php
/**
 * Created by PhpStorm.
 * User: habracoder
 * Date: 6/7/18
 * Time: 8:59 PM
 */

namespace CHBuilder;

use ClickHouseDB\Client;

class Instance
{
    private $client;

    /**
     * Instance constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Builder
     */
    public function createQueryBuilder(): Builder
    {
        return new Builder($this->client);
    }
}