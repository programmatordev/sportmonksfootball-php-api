<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\Endpoint\CityEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\ContinentEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CountryEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\FilterEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RegionEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\ScheduleEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\SeasonEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\StateEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TypeEndpoint;

class SportMonksFootballTest extends AbstractTest
{
    #[DataProvider('provideMethodsData')]
    public function testSportMonksFootballMethods(string $instance, string $methodName)
    {
        $this->assertInstanceOf($instance, $this->givenApi()->$methodName());
    }

    public static function provideMethodsData(): \Generator
    {
        yield 'config' => [Config::class, 'config'];
        yield 'cities' => [CityEndpoint::class, 'cities'];
        yield 'continents' => [ContinentEndpoint::class, 'continents'];
        yield 'countries' => [CountryEndpoint::class, 'countries'];
        yield 'filters' => [FilterEndpoint::class, 'filters'];
        yield 'regions' => [RegionEndpoint::class, 'regions'];
        yield 'schedules' => [ScheduleEndpoint::class, 'schedules'];
        yield 'seasons' => [SeasonEndpoint::class, 'seasons'];
        yield 'states' => [StateEndpoint::class, 'states'];
        yield 'types' => [TypeEndpoint::class, 'types'];
    }
}