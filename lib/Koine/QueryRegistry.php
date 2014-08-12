<?php

namespace Koine;

use Koine\QueryRegistry\Query;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class QueryRegistry
{
    /**
     * @var Hash
     */
    protected $queries;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->queries = new Hash;
    }

    /**
     * @param string $sql
     * @param array  $params
     */
    public function register($sql, $params = null)
    {
        $this->queries[] = new Query($sql, $params);

        return $this;
    }

    /**
     * @return Hash[QueryRegistry\Query]
     */
    public function getQueries()
    {
        return $this->queries;
    }
}
