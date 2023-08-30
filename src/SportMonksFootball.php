<?php

namespace ProgrammatorDev\SportMonksFootball;

use ProgrammatorDev\SportMonksFootball\Endpoint\ContinentEndpoint;

class SportMonksFootball
{
    public function __construct(
        private readonly Config $config
    ) {}

    public function config(): Config
    {
        return $this->config;
    }

    public function continents(): ContinentEndpoint
    {
        return new ContinentEndpoint($this);
    }
}