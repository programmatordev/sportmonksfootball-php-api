<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\Endpoint\ContinentEndpoint;

class SportMonksFootballTest extends AbstractTest
{
    public function testSportMonksFootballConfig()
    {
        $this->assertInstanceOf(Config::class, $this->givenApi()->config());
    }

    public function testSportMonksFootballContinents()
    {
        $this->assertInstanceOf(ContinentEndpoint::class, $this->givenApi()->continents());
    }
}