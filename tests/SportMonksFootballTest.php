<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Config;

class SportMonksFootballTest extends AbstractTest
{
    public function testSportMonksFootballConfig()
    {
        $this->assertInstanceOf(Config::class, $this->givenApi()->config);
    }
}