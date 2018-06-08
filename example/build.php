<?php

include_once __DIR__ . '/../vendor/autoload.php';



$client = new ClickHouseDB\Client([
    'username' => 'default',
    'password' => '',
    'host' => '127.0.0.1',
    'port' => 8123,
]);


$i = new \CHBuilder\Instance($client);

$qb = $i->createQueryBuilder();
$ex = $qb->expr();

/*


SELECT CounterID, 1 AS table, toInt64(count()) AS c
    FROM test.hits
    GROUP BY CounterID

UNION ALL

SELECT CounterID, 2 AS table, sum(Sign) AS c
    FROM test.visits
    GROUP BY CounterID
    HAVING c > 0

 */


$qb->select('uid')
    ->from('hits')
    ->where(
        $qb->expr()->eq('uid', 123)
    );

var_dump(
    $qb->__toString()
);