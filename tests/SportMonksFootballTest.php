<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\Endpoint\CityEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CoachEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\ContinentEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\CountryEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\FilterEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\PlayerEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RegionEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\RoundEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\ScheduleEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\SeasonEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\StageEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\StateEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TeamEndpoint;
use ProgrammatorDev\SportMonksFootball\Endpoint\TeamSquadEndpoint;
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
        yield 'coaches' => [CoachEndpoint::class, 'coaches'];
        yield 'continents' => [ContinentEndpoint::class, 'continents'];
        yield 'countries' => [CountryEndpoint::class, 'countries'];
        yield 'filters' => [FilterEndpoint::class, 'filters'];
        yield 'players' => [PlayerEndpoint::class, 'players'];
        yield 'regions' => [RegionEndpoint::class, 'regions'];
        yield 'rounds' => [RoundEndpoint::class, 'rounds'];
        yield 'schedules' => [ScheduleEndpoint::class, 'schedules'];
        yield 'seasons' => [SeasonEndpoint::class, 'seasons'];
        yield 'stages' => [StageEndpoint::class, 'stages'];
        yield 'states' => [StateEndpoint::class, 'states'];
        yield 'teams' => [TeamEndpoint::class, 'teams'];
        yield 'team squads' => [TeamSquadEndpoint::class, 'teamSquads'];
        yield 'types' => [TypeEndpoint::class, 'types'];
    }
}