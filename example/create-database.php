<?php

include_once __DIR__ . '/../vendor/autoload.php';

$i = new \CHBuilder\Instance($client);

$qb = $i->createQueryBuilder();

$qb->create()
    ->database('statistics')
    ->setIfNotExists(true);

$qb->create()
    ->view('statistics');

