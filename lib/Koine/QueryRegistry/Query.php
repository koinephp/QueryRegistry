<?php

namespace Koine\QueryRegistry;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class Query
{
    /**
     * @var string
     */
    protected $sql;

    /**
     * @var array
     */
    protected $params = array();

    /**
     * @param string $sql
     * @param array  $params
     */
    public function __construct($sql, $params = null)
    {
        $this->sql = $sql;

        if ($params) {
            $this->params = $params;
        }
    }

    /**
     * Get the sql query
     *
     * @return string
     */
    public function getSql()
    {
        return $this->sql;
    }

    /**
     * Get the query params
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * String explaing the query and the params
     * @return string
     */
    public function dump()
    {
        $query = $this->getSql();

        $params = array();

        foreach ($this->getParams() as $name  => $value) {
            $params[] = "$name = $value";
        }

        $params = implode("\n", $params);

        return <<<TEXT
--------------------------------------------------------------------------------
Query:
--------------------------------------------------------------------------------
########### SQL:

$query

########### Params:

$params
--------------------------------------------------------------------------------
TEXT;
    }

    public function __toString()
    {
        return $this->dump();
    }
}
