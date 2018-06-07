<?php

namespace ClickHouseDB\Tests;

use ClickHouseDB\Query\Degeneration\Bindings;
use PHPUnit\Framework\TestCase;

/**
 * Class BindingsTest
 * @package ClickHouseDB\Tests
 * @group BindingsTest
 */
final class BindingsTest extends TestCase
{
    use WithClient;

    /**
     * @return array
     */
    public function escapeDataProvider()
    {
        return [
            [
                'select * from test. WHERE id = :id',
                ['id' => 1],
                'select * from test. WHERE id = 1',
            ],
            [
                'select * from test. WHERE id = :id',
                ['id' => '1'],
                "select * from test. WHERE id = '1'",
            ],
            [
                'select * from test. WHERE id IN (:id)',
                ['id' => ['1', 2]],
                "select * from test. WHERE id IN ('1','2')",
            ],
            [
                'select * from test. WHERE id IN (:id)',
                ['id' => ['1', "2') OR ('1'='1"]],
                "select * from test. WHERE id IN ('1','2\') OR (\'1\'=\'1')",
            ],
            [
                'select * from test. WHERE id = :id',
                ['id' => "2' OR (1=1)"],
                "select * from test. WHERE id = '2\' OR (1=1)'",
            ],
        ];
    }

    public function testBindselectAsync()
    {
        // https://github.com/bcit-ci/CodeIgniter/blob/develop/system/database/DB_driver.php#L920

        $a=$this->client->selectAsync("SELECT :a, :a2", [
            "a" => "a",
            "a2" => "a2"
        ]);
        $this->assertEquals("SELECT 'a', 'a2' FORMAT JSON",$a->sql());

        $a=$this->client->selectAsync("SELECT :a, :a2", [
            "a1" => "x",
            "a2" => "x"
        ]);

        $this->assertEquals("SELECT :a, 'x' FORMAT JSON",$a->sql());



        $a=$this->client->selectAsync("SELECT {a}, {b}", [
            "a" => ":b",
            "b" => ":B"
        ]);
        $this->assertEquals("SELECT ':B', :B FORMAT JSON",$a->sql());

        $keys=[
            'key1'=>1,
            'key111'=>111,
            'key11'=>11,
            'key123' => 123,
        ];

        $this->assertEquals(
            '123=123 , 11=11, 111=111, 1=1, 1= 1, 123=123 FORMAT JSON',
            $this->client->selectAsync('123=:key123 , 11={key11}, 111={key111}, 1={key1}, 1= :key1, 123=:key123', $keys)->sql()
        );
    }


    /**
     * @param string $sql Given SQL
     * @param array $params Params
     * @param string $expectedSql Expected SQL
     * @dataProvider escapeDataProvider
     */
    public function testEscape($sql, $params, $expectedSql)
    {

        $bindings = new Bindings();
        $bindings->bindParams($params);
        $sql = $bindings->process($sql);
        $this->assertSame($expectedSql, $sql);
    }

    public function testSelectAsKeys()
    {
        // chr(0....255);
        $this->client->settings()->set('max_block_size', 100);

        $bind['k1']=1;
        $bind['k2']=2;

        $select=[];
        for($z=0;$z<200;$z++)
        {
            $bind['k'.$z]=chr($z);
            $select[]=":k{$z} as k{$z}";
        }

        $rows=$this->client->select("SELECT ".implode(",\n",$select),$bind)->rows();

        $this->assertNotEmpty($rows);

        $row=$rows[0];

        for($z=10;$z<100;$z++) {
            $this->assertArrayHasKey('k'.$z,$row);
            $this->assertEquals(chr($z),$row['k'.$z]);

        }
    }
}
