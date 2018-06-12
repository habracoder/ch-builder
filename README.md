# PHP QueryBuilder for ClickHouse SQL

Simple query builder

**Building insert query**
```php
$data = [
    ['id' => 123, 'clicks' => 1],
    ['id' => 124, 'clicks' => 1],
];
$sql = (string) $qb
    ->insert($data)
    ->into('statistic_clicks')
    ->database('analytics');
```


**Building select query**
```php
$sql = (string) $qb
    ->select('date', 'id', 'clicks')
    ->from('statistic_clicks')
    ->database('analytics')
    ->where(
        $qb->expr()->andX(
            $qb->expr()->eq('id', 123),
            $qb->expr()->gt('clicks', 10)
        )
    );
```
