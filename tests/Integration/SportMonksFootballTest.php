<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Resource\BookmakerResource;
use ProgrammatorDev\SportMonksFootball\Resource\CityResource;
use ProgrammatorDev\SportMonksFootball\Resource\CoachResource;
use ProgrammatorDev\SportMonksFootball\Resource\CommentaryResource;
use ProgrammatorDev\SportMonksFootball\Resource\ContinentResource;
use ProgrammatorDev\SportMonksFootball\Resource\CountryResource;
use ProgrammatorDev\SportMonksFootball\Resource\FilterResource;
use ProgrammatorDev\SportMonksFootball\Resource\FixtureResource;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class SportMonksFootballTest extends AbstractTest
{
    public function testMethods()
    {
        $this->assertInstanceOf(BookmakerResource::class, $this->api->bookmakers());
        $this->assertInstanceOf(CityResource::class, $this->api->cities());
        $this->assertInstanceOf(CoachResource::class, $this->api->coaches());
        $this->assertInstanceOf(CommentaryResource::class, $this->api->commentaries());
        $this->assertInstanceOf(ContinentResource::class, $this->api->continents());
        $this->assertInstanceOf(CountryResource::class, $this->api->countries());
        $this->assertInstanceOf(FilterResource::class, $this->api->filters());
        $this->assertInstanceOf(FixtureResource::class, $this->api->fixtures());
    }
}