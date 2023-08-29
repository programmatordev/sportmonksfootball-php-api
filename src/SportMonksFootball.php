<?php

namespace ProgrammatorDev\SportMonksFootball;

use ProgrammatorDev\SportMonksFootball\Endpoint\ContinentEndpoint;

class SportMonksFootball
{
    public ContinentEndpoint $continents;

    public function __construct(public readonly Config $config)
    {
        $this->continents = new ContinentEndpoint($this);
    }
}