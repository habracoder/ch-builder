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

$qb->orderBy('uid', 'item')
    ->orderBy('uid desc', 'item ask')
    ->orderBy('uid, item desc')
    ->andOrderBy('sum(wages)')
    ->orderBy(['uid' => 'desc', 'item' => 'asc']);

/*

SELECT * FROM system.parts WHERE active

 */

$qb->insert([])->format('CSV');

var_dump((string)$qb);

$qb->select('uid, date')
    ->distinct()
    ->from('parts')
    ->database('system')
    ->where(
        $ex->andX(
            $qb->expr()->in('uid', ':widgetUid'),
            $qb->expr()->eq('composite', ':composite')
        )
    )
    ->setParameter('widgetUid', [12, 13, 14, 15])
    ->setParameter('composite', 10)
    ->limit(10, 20)
    ->orderBy('uid', 'item')
    ->orderBy('uid desc', 'item ask')
    ->orderBy('uid, item', 'ask')
    ->orderBy('uid, item desc')
    ->orderBy(['uid' => 'desc', 'item' => 'asc'])
;

var_dump(
    $qb->__toString()
);
