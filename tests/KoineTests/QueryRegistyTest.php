<?php

namespace KoineTests;

use Koine\QueryRegistry;
use PHPUnit_Framework_TestCase;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class QueryRegistyTest extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function setUp()
    {
        $register = new QueryRegistry();

        $params = array('id' => 1);

        $register->register("SELECT * FROM users")
            ->register("SELECT * FROM users WHERE id=:id", $params);

        $this->object = $register;
    }

    /**
     * @test
     */
    public function registersQueries()
    {
        $this->assertCount(2, $this->object->getQueries());
    }

    /**
     * @test
     */
    public function createsQueryObjectsWithTheCorrectParams()
    {
        $query = $this->object->getQueries()->last();

        $this->assertInstanceOf('\Koine\QueryRegistry\Query', $query);

        $this->assertEquals(
            'SELECT * FROM users WHERE id=:id',
            $query->getSql()
        );

        $this->assertEquals(array('id' => 1), $query->getParams());
    }
}
