<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Resource\BookmakerResource;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class SportMonksFootballTest extends AbstractTest
{
    public function testMethods()
    {
        $this->assertInstanceOf(BookmakerResource::class, $this->api->bookmakers());
    }
}