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

$qb->select(
    $ex->as($ex->any('uid'), 'uid'),
    $ex->as($ex->sum('wages'), 'wages'),
    $ex->as($ex->sumIf('wages', 'type = 1'), 'wages')
)->from('widget_statistics_shows_rtb');

$qb = new \CHBuilder\Builder($client);

$qb->createBuilder()
    ->select(
        'uid'
    )->from(
        $qb->createBuilder()->select('uid')->getQuery()
    );

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

$qb->select(
    'CounterID',
    $ex->as($ex->value(1), 'table'),
    $ex->as($ex->toInt64($ex->count()), 'c')
);


var_dump(
    $query->__toString()
);

var_dump(
    $query->__toString()
);