<?php

namespace ProgrammatorDev\SportMonksFootball;

use ProgrammatorDev\SportMonksFootball\Endpoint\ContinentEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CountryEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RegionEndpoint;

class SportMonksFootball
{
    public function __construct(private readonly Config $config) {}

    public function config(): Config
    {
        return $this->config;
    }

    public function continents(): ContinentEndpoint
    {
        return new ContinentEndpoint($this);
    }

    public function countries(): CountryEndpoint
    {
        return new CountryEndpoint($this);
    }

    public function regions(): RegionEndpoint
    {
        return new RegionEndpoint($this);
    }
}