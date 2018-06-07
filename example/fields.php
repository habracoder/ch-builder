<?php

use CHBuilder\Components\Field;

include_once __DIR__ . '/../vendor/autoload.php';

$fields = new \CHBuilder\Components\Fields;

$fields
    ->addField(
        new Field('uid', 'any(uid)')
    )
    ->addField(
        new Field('wages', 'sum(wages)')
    )
    ->addField(
        new Field('date')
    );



var_dump(
    $fields->__toString()
);

