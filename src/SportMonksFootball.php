<?php

namespace ProgrammatorDev\SportMonksFootball;

use ProgrammatorDev\SportMonksFootball\Endpoint\CityEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\ContinentEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CountryEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\FilterEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RegionEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TypeEndpoint;

class SportMonksFootball
{
    public function __construct(private readonly Config $config) {}

    public function config(): Config
    {
        return $this->config;
    }

    public function cities(): CityEndpoint
    {
        return new CityEndpoint($this);
    }

    public function continents(): ContinentEndpoint
    {
        return new ContinentEndpoint($this);
    }

    public function countries(): CountryEndpoint
    {
        return new CountryEndpoint($this);
    }

    public function filters(): FilterEndpoint
    {
        return new FilterEndpoint($this);
    }

    public function regions(): RegionEndpoint
    {
        return new RegionEndpoint($this);
    }

    public function types(): TypeEndpoint
    {
        return new TypeEndpoint($this);
    }
}