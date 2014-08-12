<?php

namespace KoineTests\QueryRegistry;

use Koine\QueryRegistry\Query;
use PHPUnit_Framework_TestCase;

class QueryTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function setUp()
    {
        $this->object = new Query(
            "SELECT * FROM users WHERE id=:id",
            array('id' => 1)
        );
    }

    /**
     * @test
     */
    public function itGetsTheSql()
    {
        $this->assertEquals(
            'SELECT * FROM users WHERE id=:id',
            $this->object->getSql()
        );
    }

    /**
     * @test
     */
    public function itGetsTheParams()
    {
        $this->assertEquals(array('id' => 1), $this->object->getParams());
    }

    /**
     * @test
     */
    public function itDumpsTheQuery()
    {
        $string = $this->object->__toString();

        $expectedString = <<<TEXT
--------------------------------------------------------------------------------
Query:
--------------------------------------------------------------------------------
########### SQL:

SELECT * FROM users WHERE id=:id

########### Params:

id = 1
--------------------------------------------------------------------------------
TEXT;

        $this->assertEquals($expectedString, $string);
    }
}
