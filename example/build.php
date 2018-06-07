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
$qb->expr();

$qb->select(
    $qb->as($qb->any('uid'), 'uid'),
    $qb->as($qb->sum('wages'), 'wages')
);

$qb = new \CHBuilder\Builder($client);

$qb->createBuilder()
    ->select(
        'uid'
    )->from(
        $qb->createBuilder()->select('uid')->getQuery()
    );


$query = $qb
    ->select('date', 'uid')
    ->from('widget_statistics_shows_rtb')
    ->getQuery();

var_dump(
    $query->getSQL()
);

var_dump(
    $query->getResult()
);